cd /d %~dp0
set  tl=..\InsertText\InsertText\bin\Debug\InsertText.exe
set  cv=..\copyIndexHtmslToCountryFolders\copyIndexHtmslToCountryFolders\bin\Debug\copyIndexHtmslToCountryFolders.exe

copy "%~dp0..\psgg-site-text.xlsm" tmp.xlsm

%tl% index-temp.html tmp.xlsm index-j.html j

%tl% index-temp.html tmp.xlsm index-e.html e

del tmp.xlsm

copy index-e.html index.html

%cv% .

::pause