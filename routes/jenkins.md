# Prva proba sa jenkins CI
http://localhost:9090/job/pokreni%20skriptu%20pwd/configure
NGROK: https://d98a-31-217-46-17.ngrok-free.app/login?from=%2F
user: pmrvic
pass: 35e2d01ee35541ca992f552f29621279

git log -1

opet2
dominik

pass za jenkins:pmrvic

# promjena imena branck "11.x" => "main"

Updating a local clone after a branch name changes
After you rename a branch in a repository on GitHub, any collaborator with a local clone of the repository will need to update the clone.

From the local clone of the repository on a computer, run the following commands to update the name of the default branch.
'''
git branch -m OLD-BRANCH-NAME NEW-BRANCH-NAME
git fetch origin
git branch -u origin/NEW-BRANCH-NAME NEW-BRANCH-NAME
git remote set-head origin -a
Optionally, run the following command to remove tracking references to the old branch name.
'''
'''
git remote prune origin
'''