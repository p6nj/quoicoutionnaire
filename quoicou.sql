create database quoicou;

create user php identified by 'K&a=K!pKv~5kf8qa';
grant select, insert on quoicou.mots to php;

use quoicou;

create table mots(label varchar(128) primary key);

INSERT INTO
    mots (label)
VALUES
    ('quoicouillon'),
    ('quoicouac'),
    ('quoicouette'),
    ('quoicourir'),
    ('quoicouchette'),
    ('quoicourant'),
    ('quoicouchon'),
    ('quoicoucou'),
    ('quoicoudon'),
    ('quoicouille'),
    ('quoicouper'),
    ('quoicoule'),
    ('quoicouverture'),
    ('quoicouilleur'),
    ('quoicouffle'),
    ('quoicoureur'),
    ('quoicoulis'),
    ('quoicoulade'),
    ('quoicoutis'),
    ('quoicoussin'),
    ('quoicouetteur'),
    ('quoicoussière'),
    ('quoicoulisse'),
    ('quoicouloir'),
    ('quoicouillère'),
    ('quoicoudée'),
    ('quoicouvrant'),
    ('quoicouffeur'),
    ('quoicouetteuse'),
    ('quoicoussard'),
    ('quoicouenne'),
    ('quoicouillée'),
    ('quoicouillais'),
    ('quoicoureuse'),
    ('quoicoussant'),
    ('quoicouillard'),
    ('quoicoulasse'),
    ('quoicoupeur'),
    ('quoicousserie'),
    ('quoicoufle'),
    ('quoicourroir'),
    ('quoicoups'),
    ('quoicouvreuse'),
    ('quoicoublier'),
    ('quoicouvert'),
    ('quoicougnant'),
    ('quoicoubert'),
    ('quoicoudesque'),
    ('quoicoutant'),
    ('quoicoulombe'),
    ('quoicoupe'),
    ('quoicoupette');