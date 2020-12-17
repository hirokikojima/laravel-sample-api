<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', '');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

host('production.example.com')
    ->user('ec2-user')
    ->identityFile('~/.ssh/***.pem')
    ->stage('production')
    ->set('laravel_env', '.env.production')
    ->set('deploy_path', '/var/www/{{application}}');    

host('development.example.com')
    ->user('ec2-user')
    ->identityFile('~/.ssh/***.pem')
    ->stage('development')
    ->set('laravel_env', '.env.development')
    ->set('deploy_path', '/var/www/{{application}}');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// shared/.envを.env.{stage}で上書きする
after('deploy:shared', 'overwrite-env');

// overwrite .env file
desc('shared/.envを.env.{stage}で上書き');
task('overwrite-env', function () {
    $stage = get('stage');
    $src = ".env.${stage}";
    $deployPath = get('deploy_path');
    $sharedPath = "${deployPath}/shared";
    run("cp -f {{release_path}}/${src} ${sharedPath}/.env");
});

// Migrate database before symlink new release.
// before('deploy:symlink', 'artisan:migrate');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');