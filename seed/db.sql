CREATE USER 'ewaproject'@'%' IDENTIFIED BY 'ewa_pass'; GRANT USAGE ON * . * TO 'ewaproject'@'%' IDENTIFIED BY 'ewa_pass' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;CREATE DATABASE ewaproject; GRANT ALL PRIVILEGES ON `ewaproject` . * TO 'ewaproject'@'%';