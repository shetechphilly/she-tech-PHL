she-tech-PHL
======

The WordPress child theme files for www.shetechphilly.com

###Pulling down the child theme files from github for the first time:

* cd into the themes folder in your local directory of STP files
* then type: git clone git@github.com:shetechphilly/she-tech-PHL.git she-tech-PHL (this pulls the child theme files to your local computer)
* then cd into she-tech-PHL, and type: git init (this initializes your local git repo)
* if you want to see the hidden git files that you now have in the child theme folder, in a new terminal tab, cd ~, and then type:  defaults write com.apple.Finder AppleShowAllFiles TRUE
* then type: killall Finder (which will close all your finder windows)
* when you reopen finder, you should see the git files shaded out, which means you’re all set!

###Pulling the latest changes from master once you have your local repo set up:

* cd she-tech-PHL
* git pull origin master
* now you’re good to make changes!

###Pushing your changes to github:

* git status
* git add .
* git commit -m 'your commit message'
* git push origin master
