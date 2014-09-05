# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "debian-7.3-64"
  config.vm.box_url = "http://puppet-vagrant-boxes.puppetlabs.com/debian-73-x64-virtualbox-puppet.box"

  config.vm.network "private_network", ip: "192.168.33.10"

  config.vm.synced_folder "./hack-playground", "/hack-playground"

  config.vm.provision "shell", path: "./vagrant/provision.sh"
end
