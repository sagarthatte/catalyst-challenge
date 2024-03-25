# CatalystIT Coding Challenge
# Tools used - Windows OS based AWS workspace, VSCode IDE, PHP 8.0.30, MYSQL 8.0

# 1 - Script Task
- The script task can be found in the root directory 'catalyst-challenge' as a php script file named 'user_upload.php' as requested
- The script can be run/executed from the command line (git bash was used in my case).
- The following list of commands are expected and will return the output as expected.
    a. `php user_upload.php --help`
        => This will show a list of acceptable commands for executing script for the task.
    b. `php user_upload.php --create_table -u [MySQL username] -p [MySQL password] -h [MySQL hostname]`
        => This will create a users table in the MySQL DB if not already exists.
    c. `php user_upload.php --file [CSV filename] --dry_run  -u [MySQL username] -p [MySQL password] -h [MySQL hostname]`
        => This will check for csv file, read file if it exists and only process and validate the records (no inserts)
    d. `php user_upload.php --file [CSV filename] -u [MySQL username] -p [MySQL password] -h [MySQL hostname]`
        => This command will first check for csv file, then create users table (if not exists), and then process the records, and insert the valid records into database table 'users'.


    # AI/Online Help
        - ChatGPT was used to get a basic idea of the type of commands to be expected to be run for the script task based on the expectations overall. The question specifically asked was 'I need to create a PHP script file that needs to be executed from the CLI and needs to either display help information using --help OR create a table in the MYSQL Database OR process csv file and insert records into the database table. Given this requirement, what is the list of commands that I would need to prepare for and how would they look like in the CLI?'
        - I also used some google and stack overflow, to configure MySQL correctly with PHP. Some google help was also used to refresh my memory regarding certain PHP method usages. Example: Methods to open csv file, etc.

# ---------------------------------------------------------------------------------------------------------------------------------------------------------#

# 2 - Logic Test
- This script can again be found in the root directory 'catalyst-challenge' as requested. File name is 'foobar.php'.
- Script can be executed from command line using `php foobar.php` command.

# AI/Online help
- No AI or online help was required for this task.


# Do let me know in case of any additional questions and comments, I would be happy to answer.

# Author: Sagar Thatte
# Email: sagarthatte@gmail.com
