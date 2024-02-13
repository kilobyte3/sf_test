symfony console cache:clear
RMDIR .git /S /Q
git init
git add .
git rm -r --cached .idea
git rm -r --cached symfony.exe
git rm -r --cached develery_developer_2024.pdf
git commit -m "Initial commit"
git remote add origin https://github.com/kilobyte3/sf_test.git
git push -u --force origin master