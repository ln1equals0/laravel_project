# Introduction

Laravel strives to make the entire PHP development experience delightful, including your local development environment. Vagrant provides a simple, elegant way to manage and provision Virtual Machines.

Laravel Homestead is an officia, pre-pacckaged Vagrant box that provides you a wonderful development environment without requireing you to install PHP, HHVM, a web server, and any other server software on you local machine. No more worring about messingn up your operating system! Vagrant boxes are completely disposable. If something goes wrong, you can destroy and re-create the box in minutes!

Hoestead runs on any Windows, Mac, or Linux system, and includes the Nginx web server, PHP 7.0, MySQL, Postgres, Redis, Memcached, Node, and all of the other goodies you need to develop amazing Laravel application

Note: if you are using Windows, you may need to enable hardware virtualization(VT-x). It can usually be enabled via your BIOS. If you are using Hyper-V on a UEFI system you may addionally need to disable Hyper-V in order to access VT-x.

Included Software
- Ubuntu 14.04
- Git
- PHP 7.0
- HHVM
- Nginx
- MySQL
- MariaDB
- Sqlite3
- Postgres
- Composer
- Node(With PM2, Bower, Grunt, and Gulp)
- Redis
- Memcached
- Beanstalkd

# Installation & Setup

First Steps

Before launcing your Homestead environment, you must install VirtualBox 5.x or VMWare as well as Vagrant. All of these software packages provide easy-to-use visual intaller for all popular operating systems.

To use the VMware provider, you will need to purchase both VMware Fusion / Workstation and the VMware Vagrant plug-in. Though it is not free, VMware can provide faster shared folder performance out of the box.

Installing The Homestead Vagrant Box

Once VitualBox/VMware and Vagrant have been installed, you should add the laravel/homestead box to your Vagrant installation using the following command in your terminal. It will take a few minutes to download the box, depending on your Internet connection speed:

vagrant box add laravel/homestead

If this command fails, make sure your Vagrant installation is up to date.

Installing Homestead

You may install Homestead by simply cloning the repository. Consider cloning the repository into a Homestead folder within your "home" directory, as the Homestead box will serve as the host to all of your Laravel projects:

`cd ~`
`git clone https://github.com/laravel/homestead.git Homestead`

Once you have cloned the Homestead repository, run the bash init.sh command from the Home directory to create the Homestead.yaml configurationfile. The Homestead.yaml file will be placed in the ~/.homestead hidden directory:

bash init.sh


Configuring Homestead

Setting Your Provider

The provider key in your ~/.homestad/Homestad.yaml file indicates which Vagrant provider should be used: virtualbox, vmwar_fusion, or vmwar_workstation. You may set this to the provider you prefer:

provider: virtualbox

Configuring Shared folders

The folders property of the Homestead.yaml file lists all of the folders you wish to share with your Homestaed environment. As files within these folders are changed, they will be kept in sync between your local machine and the Homestead environment. You may configure as many shared folders as necessary:

folders:
	- map: ~/Code
	  to: /home/vagrant/Code

To enable NFS, just add a simple flag to your synced folder configuration:

folders:
	- map: ~/Code
	  to: /home/vagrant/Code
	  type: "nfs"

##Configuring Nginx Sites
Not familiar with Nginx? No problem. The sites property allows you to easily map a "domain" to a folder on your Homestead environment. Asample site configuration is include int eh Homestead.yaml file. Again, you may add as many sites to your Homestead environment as necessary. Homestead can serve as a conveniet, virutalize environment for every Laravel project you are working on:

sites:
	- map: homestead.app
	  to: /home/vagrant/Code/Laravel/public

You can make any Homestead site use HHVM by setting the hhvm option to true:

sites:
	- map: homestead.app
	  to: /home/vagrant/Code/Laravel/public
	  hhvm: true

if you change the sites property after provisioning the Homestead box, you should re-run vagrant reload --provision to update the Nginx configuration on the virtual machine.


The Hosts File
You must add the "domains" for your Nginx sites to the hosts file on your machine. The hosts file will redirect requests for your Homestead sites into your Homestead machine. On Mac and Linux, this file is located at /etc/hosts. On Windows, it is located at C:\Windows\System32\drivers\etc\hosts. The lines you add to this file will look like the following:

192.168.10.10 homestead.app
