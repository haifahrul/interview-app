@TITLE DELETE LOG Application Eseal Data
@ECHO ---------------------------------------------------
@ECHO -------- Delete Log Application Eseal Data --------
@ECHO ---------------------------------------------------
@ECHO Please do not close! and please wait ...
@ECHO *After finish, this task will close automatically ...
@ECHO OFF

rem -------------------------------------------------------------
rem  Yii command line for execute delete log.
rem
rem  @author haifahrul <haifahrul@gmail.com>
rem -------------------------------------------------------------

@setlocal

set YII_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php

"%PHP_COMMAND%" "%YII_PATH%yii" delete-log

@endlocal
