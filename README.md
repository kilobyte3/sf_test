# Readme

Adatbázis migrálásához le kell futtatni:

`php bin/console doctrine:migrations:migrate DoctrineMigrations\Version20240211213814`

`php bin/console doctrine:migrations:migrate DoctrineMigrations\Version20240212165636`

De amennyiben mégis gond lenne, manuálisan is lehet importálni a `dump.sql` fájlból.