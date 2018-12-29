DROP TABLE IF EXISTS "film";
DROP TABLE IF EXISTS "category";
DROP TABLE IF EXISTS "realisator";

PRAGMA foreign_keys = ON;

CREATE TABLE IF NOT EXISTS "category" (
  'id' INTEGER  NOT NULL PRIMARY  KEY AUTOINCREMENT UNIQUE,
  'name' TEXT NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS "realisator" (
  'id' INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  'name' TEXT NOT NULL,
  'surname' INTEGER NOT NULL,
  'dob' DATE NOT NULL
);

CREATE  TABLE IF NOT EXISTS "film" (
  'id' INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  'name' TEXT NOT NULL,
  'year' INTEGER NOT NULL,
  'summary' TEXT NOT NULL,
  'category_id' INTEGER NOT NULL,
  'realisator_id' INTEGER NOT NULL,
  'image_path' TEXT,
  FOREIGN KEY('category_id') REFERENCES 'category'('id'),
  FOREIGN KEY('realisator_id') REFERENCES 'realisator'('id')
);

INSERT INTO category(name)
VALUES ('Classique'), ('Action'), ('Abrutissant');

INSERT INTO realisator(name, surname, dob)
VALUES ('Dupont', 'Albert', '1990-05-28'),
('Dubois', 'Franck', '1891-01-01'),
('James', 'Cameron', '1976-12-25');

INSERT INTO film(name, year, summary, category_id, realisator_id, image_path)
VALUES
('Titanic', 1994, 'Elle raconte l''histoire de deux jeunes passagers du paquebot Titanic en avril 1912. L''un, Rose, est une passagère de première classe qui tente de se suicider pour se libérer des contraintes imposées par son entourage, et le second, Jack, est un vagabond embarqué à la dernière minute en troisième classe pour retourner aux États-Unis. Ils se rencontrent par hasard lors de la tentative de suicide de Rose et vivent une histoire d''amour vite troublée par le naufrage du navire.!', 1, 2, 'img/film/film-1.jpeg'),
('Teletubies', 2018, 'Cette série destinée aux très jeunes enfants met en scène les aventures de quatre personnages très colorés nommés Tinky Winky, Dipsy, Laa Laa et Po, tous possédant une télévision sur le ventre qui leur permet de capter des émissions pour enfants. Ils vivent à Télétubbyland, dans un dôme futuriste — le « Tubbydome Supertronic » — situé au milieu de collines couvertes de pelouses et peuplées de lapins, de fleurs parlantes, ainsi que de haut-parleurs eux aussi parlants et sortant du sol tels des périscopes.', 3, 3, 'img/film/film-2.jpg');


