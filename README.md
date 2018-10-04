# Icegram - Popups (Weekdays Addon)

If you're reading this file, it probably means that you are either responsible for the development of this plugin, inquisitive, or you have a lot of time on your hands. Let's assume that you're a web developer and are now responsible for future develpment or content changes in this plugin. Hopefully, this plugin was developed in a manner sufficient to make your job easier.

This document is intended just for you, to provide you with the development details of this plugin and instructions for maintaining it.

# Plugin Summary

This plugin adds a feature to the [Icegram Popups, Welcome Bar, Optins and Lead Generation plugin by Icegram](https://wordpress.org/plugins/icegram/) that it currently does not provide. With the Icegram plugin, it is possible to create optins and call-to-action banners (message campaigns) that display to the user only within a defined date range. However, it does not provide the ability to limit the campaign to selected days of the week within that range. For example, running the campaign Monday, Wednesday, and Friday only. Our plugin adds this feature.

# Dependencies

Before installing our plugin, you must install the [Icegram Popups, Welcome Bar, Optins and Lead Generation plugin](https://wordpress.org/plugins/icegram/).

# Installation

    1. Download the plugin from this repository.
    2. Navigate to your WordPress site's /wp-content/plugins directory and copy the plugin folder in to it.
    3. Activate the plugin through the ‘Plugins’ menu in WordPress.
    4. Click on ‘Icegram -> Campaigns -> Display Rules tab’ from the WordPress admin sidebar menu.
    5. In the Display Rules tabbed panel, navigate to the 'When?' section.
    6. Click the radio button for 'Schedule.' Seven checkboxes will appear, one for each day of the week. Select the days of the week you wish your campaign to run within your selected date range.

![icegram-weekdays-configuration](https://user-images.githubusercontent.com/3323104/43471928-7a011984-94a9-11e8-8c77-3de6f9419b48.jpg)

# Development Guide

Read this section carefully before modifying the plugin code. Here's an outline:

    1. Git Version Control System
        -- Starting From Scratch
        -- Import Existing Files on Your Computer
    And That's It!

## 1. Git Version Control System

[Git](https://git-scm.com/book/en/v2/Getting-Started-Git-Basics) is a version control system for tracking changes in computer files and coordinating work on those files among multiple people. The development of this plugin uses Git for this purpose. More specifically, we use [GitHub](https://github.com) as our public Git repository.

We will show you a couple of common ways to start using Git, with GitHub as an example repository.

### Starting From Scratch

To start using your repository from scratch, on your command line type the following:

```
cd /wp-content/plugins
git clone https://github.com/dfaltermier/icegram-weekdays.git icegram-weekdays
cd icegram-weekdays
echo "Append a line to my README.md file." >> README.md
git add README.md
git commit -m "My commit message."
git push -u origin master
```

With the commands above, you will create a folder, download the plugin from Git, modify a file in it, make your first commit, and push the changes to your repository, to master branch. Master branch is the default branch to use for your files.

### Import Existing Files on Your Computer

To import your existing files from your local machine type the following in your command line:

```
cd /wp-content/plugins/icegram-weekdays
git init
git remote add origin https://github.com/dfaltermier/icegram-weekdays.git
git add .
git commit -m "Importing my project to Git."
git push -u origin master
```

Learning and using Git is beyond the scope of these instructions. [Get started with Git basics](https://git-scm.com/book/en/v2/Getting-Started-Git-Basics).

# And That's It!

We hope these instructions are helpful if you find yourself maintaining the development of this plugin.

