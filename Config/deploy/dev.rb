set :application, 'cms'
set :user, "deploy"
set :repository, "git@git.rehabstudio.com:rehabstudio/cms-cakephp.git"
set :deploy_to, "/var/www/cms.rehabstudio.com"
set :cakephp_repo, "git://github.com/cakephp/cakephp.git"
set :cake_branch, "origin/master"
#set :app_plugins, {
#	"debug_kit" => "https://github.com/cakephp/debug_kit.git"
#}
server "164.177.159.247", :web, :app
set :shared_app_dirs, ["webroot/index.php", "webroot/uploads"]
require 'app-deployer/framework/cakephp/cakephp'