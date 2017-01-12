## Setup instructions

This repository is designed to be set up in accordance with the VVV install instructions in INN/docs, that were introduced with https://github.com/INN/docs/pull/148

(This is for Natasha's first commit. Thanks.)


```
vv create
```

Prompt | Text to enter 
------------ | -------------
Name of new site directory: | publicsource
Blueprint to use (leave blank for none or use largo): | largo
Domain to use (leave blank for largo-umbrella.dev): | publicsource.dev
WordPress version to install (leave blank for latest version or trunk for trunk/nightly version): | *hit [Enter]*
Install as multisite? (y/N): | n
Install as subdomain or subdirectory? : | subdomain
Git repo to clone as wp-content (leave blank to skip): | *hit [Enter]*
Local SQL file to import for database (leave blank to skip): | *This directory must be an absolute path, so the easiest thing to do on a Mac is to drag your mysql file into your terminal window here: the absolute filepath with fill itself in.*
Remove default themes and plugins? (y/N): | N
Add sample content to site (y/N): | N
Enable WP_DEBUG and WP_DEBUG_LOG (y/N): | N

After reviewing the options and creating the new install, partake in the following steps:

1. `cd` to the directory `publicsource/` in your VVV setup
2. `git clone git@github.com:INN/umbrella-publicsource.git`
3. Copy the contents of the new directory `umbrella-publicsource/` into `htdocs/`, including all hidden files whose names start with `.` periods.


## Notice of repository name change

Where this repository was once `INN/publicsource-umbrella` on Github, it is now `INN/umbrella-publicsource`. If you had previously cloned this repository, you will need to navigate to this directory on your computer and take the following steps:

1. Run `git remote -v` to list remotes. Make a note of the name that matches `git@github.com:INN/publicsource-umbrella.git`. It's probably `origin`.
2. Run `git remote set-url origin git@github.com:INN/umbrella-publicsource.git` where `origin` is the name of the remote you saw in the previous step.
3. Run `git fetch origin`
4. If you have any local working branches that track remote branches, you may need to:
	1. check out the local branch: `git checkout foo`
	2. update the local branch's upstream: `git branch -u origin/foo foo`
