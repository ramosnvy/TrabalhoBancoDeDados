@echo off

REM Defina as variáveis
set PGHOST=localhost
set PGPORT=5432
set PGUSER=postgres
set PGPASSWORD=100803
set PGDATABASE=trabalho2

REM Caminho para o executável do PostgreSQL (pg_dump)
set PG_DUMP=C:\Program Files\PostgreSQL\16\bin\pg_dump.exe

REM Diretório onde os backups serão armazenados
set BACKUP_DIR=C:\Backups\PostgreSQL

REM Nome do arquivo de backup com data e hora atual
set FILENAME=%BACKUP_DIR%\backup%date:~-4,4%%date:~-7,2%%date:~-10,2%_%time:~0,2%%time:~3,2%%time:~6,2%.sql

REM Comando para realizar o backup
"%PG_DUMP%" --host=%PGHOST% --port=%PGPORT% --username=%PGUSER% --dbname=%PGDATABASE% --format=plain --file="%FILENAME%"

REM Verifica se o backup foi criado com sucesso
if %errorlevel% neq 0 (
    echo Erro ao executar o backup. Verifique o log.
) else (
    echo Backup realizado com sucesso: %FILENAME%