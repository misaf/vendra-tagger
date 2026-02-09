<?php

declare(strict_types=1);

namespace Misaf\VendraTagger;

use Filament\Panel;
use Illuminate\Foundation\Console\AboutCommand;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class TaggerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('vendra-tagger')
            ->hasTranslations()
            ->hasMigrations([
                'add_tenant_id_column_to_tags_table',
                'rename_order_column_to_position_on_tags_table',
                'add_index_to_tags_position_column'
            ])
            ->hasInstallCommand(function (InstallCommand $command): void {
                $command->askToStarRepoOnGitHub('misaf/vendra-activity-log');
            });
    }

    public function packageRegistered(): void
    {
        Panel::configureUsing(function (Panel $panel): void {
            if ('admin' !== $panel->getId()) {
                return;
            }

            $panel->plugin(TaggerPlugin::make());
        });
    }

    public function packageBooted(): void
    {
        AboutCommand::add('Vendra Tagger', fn() => ['Version' => 'dev-master']);
    }
}
