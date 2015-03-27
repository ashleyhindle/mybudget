# -*- mode: ruby -*-
# vi: set ft=ruby :
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    config.vm.box = "ubuntu/trusty64"
    config.vm.box_url = "http://cloud-images.ubuntu.com/vagrant/trusty/current/trusty-server-cloudimg-amd64-vagrant-disk1.box"
    config.vm.synced_folder ".", "/var/mybudget.io/", :owner => "www-data", :group => "www-data"

    config.vm.network :public_network
    config.vm.network "forwarded_port", guest: 80, host: 9080

    # Share SSH locally by default
    config.vm.network "forwarded_port", guest: 22, host: 9022, id: "ssh", auto_correct: true

    config.vm.provider "virtualbox" do |v|
        v.memory = 1024
    end

    config.vm.provision "ansible" do |ansible|
        ansible.playbook = "provisioning/playbook.yml"
        ansible.sudo = true
        ansible.host_key_checking = false
        ansible.extra_vars = {
            ansible_ssh_user: 'vagrant',
            ansible_connection: 'ssh',
            ansible_ssh_args: '-o ForwardAgent=yes',
        }
        ansible.groups = {
            "vagrant" => ["default"]
        }
    end
end