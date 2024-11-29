

USE ejyr_zoo_arcadia;


 CREATE TABLE role(
        role_id INT AUTO_INCREMENT,
        label VARCHAR(50) NOT NULL,
        PRIMARY KEY(role_id),
        UNIQUE(label)
      );

      CREATE TABLE race(
        race_id INT AUTO_INCREMENT,
        label VARCHAR(50) NOT NULL,
        PRIMARY KEY(race_id)
      );

      CREATE TABLE image_habitat(
        image_id INT AUTO_INCREMENT,
        habitat_id INT NOT NULL, 
        image1_path VARCHAR(255), 
        image2_path VARCHAR(255), 
        image3_path VARCHAR(255),  
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY(image_id)
      );

      CREATE TABLE service(
        service_id INT AUTO_INCREMENT,
        nom VARCHAR(50) NOT NULL,
        description_serv VARCHAR(100),
        PRIMARY KEY(service_id),
        UNIQUE(nom)
      );

      CREATE TABLE avis(
        avis_id INT AUTO_INCREMENT,
        pseudo VARCHAR(50) NOT NULL,
        commentaire VARCHAR(255),
        IsVisible BOOLEAN NOT NULL,
        AtCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY(avis_id),
        UNIQUE(pseudo)
      );

      CREATE TABLE image_animal(
        image_animal_id INT AUTO_INCREMENT,
        animal_id INT NOT NULL,
        image1_path VARCHAR(255), 
        image2_path VARCHAR(255), 
        image3_path VARCHAR(255),
        PRIMARY KEY(image_animal_id)
      );

      CREATE TABLE aliment(
        aliment_id INT AUTO_INCREMENT,
        label_aliment VARCHAR(100),
        PRIMARY KEY(aliment_id),
        UNIQUE(label_aliment)
      );

      
      CREATE TABLE type_habitat(
        type_id INT,
        label_type VARCHAR(100) NOT NULL,
        habitat_id INT,
        PRIMARY KEY(type_id),
        UNIQUE(label_type),
        FOREIGN KEY(habitat_id) REFERENCES habitat(habitat_id)
      );



      CREATE TABLE utilisateur(
        username_id INT AUTO_INCREMENT,
        password VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL UNIQUE,
        nom VARCHAR(100) NOT NULL,
        prenom VARCHAR(100) NOT NULL,
        role_id INT NOT NULL,
        PRIMARY KEY(username_id),
        FOREIGN KEY(role_id) REFERENCES role(role_id)
      );

      CREATE TABLE habitat(
        habitat_id INT AUTO_INCREMENT,
        nom VARCHAR(100) NOT NULL,
        description VARCHAR(255) NOT NULL,
        commentaire_habitat VARCHAR(255),
        image_id INT NOT NULL,
        PRIMARY KEY(habitat_id),
        UNIQUE(nom),
        FOREIGN KEY(image_id) REFERENCES image_habitat(image_id)
      );

      CREATE TABLE animal(
        animal_id INT AUTO_INCREMENT,
        etat VARCHAR(50) NOT NULL,
        surnom VARCHAR(50) NOT NULL,
        image_animal_id INT NOT NULL,
        habitat_id INT NOT NULL,
        race_id INT NOT NULL,
        PRIMARY KEY(animal_id),
        UNIQUE(surnom),
        FOREIGN KEY(image_animal_id) REFERENCES image_animal(image_animal_id),
        FOREIGN KEY(habitat_id) REFERENCES habitat(habitat_id),
        FOREIGN KEY(race_id) REFERENCES race(race_id)
      );

      CREATE TABLE rapport_veterinaire(
        rapport_verinaire_id INT AUTO_INCREMENT,
        date_rapport_veto DATE NOT NULL,
        detail VARCHAR(255),
        animal_id INT NOT NULL,
        username_id INT NOT NULL,
        PRIMARY KEY(rapport_verinaire_id),
        FOREIGN KEY(animal_id) REFERENCES animal(animal_id),
        FOREIGN KEY(username_id) REFERENCES utilisateur(username_id)
      );

      CREATE TABLE animal_aliment(
        animal_id INT AUTO_INCREMENT,
        aliment_id INT,
        PRIMARY KEY(animal_id, aliment_id),
        FOREIGN KEY(animal_id) REFERENCES animal(animal_id),
        FOREIGN KEY(aliment_id) REFERENCES aliment(aliment_id)
      );

      CREATE TABLE username_aliment(
        username_id INT AUTO_INCREMENT,
        aliment_id INT,
        PRIMARY KEY(username_id, aliment_id),
        FOREIGN KEY(username_id) REFERENCES utilisateur(username_id),
        FOREIGN KEY(aliment_id) REFERENCES aliment(aliment_id)
      );

/* Insertion des jeux de données dans la table role */
      INSERT INTO role(label) VALUES('ROLE_ADMIN');
      INSERT INTO role(label) VALUES('ROLE_MANAGER');
      INSERT INTO role(label) VALUES('ROLE_VETERINAIRE');

/* Insertion des jeux de données dans la table service */
      INSERT INTO service(nom, description_serv) VALUES("Soins Animaliers", "Les vétérinaires s'occupent de la santé des animaux, effectuant des examens réguliers et des interventions chirurgicales si nécessaire. Les soigneurs animaliers nourrissent les animaux, nettoient leurs enclos et surveillent leur comportement pour détecter tout signe de maladie.");
      INSERT INTO service(nom, description_serv) VALUES("Visites guidées", "Des visites éducatives sont organisées pour informer les visiteurs sur les différentes espèces animales et leur habitat. Notre zoo propose souvent des programmes éducatifs pour les écoles afin de sensibiliser les enfants à la conservation des éspèces et à la biodiversité.");
      INSERT INTO service(nom, description_serv) VALUES("Conservation et Recherche", "Le zoo participe à des efforts de conservation pour protéger les espèces menacées et leur habitat. et nous collaboront également avec des institutions de recherche pour étudier le comportement animal et les méthodes de reproduction.");
      INSERT INTO service(nom, description_serv) VALUES("Loisirs et Activités", "Notre zoo offre des attraction et des spectacles d'animaux ou des démonstrations interactives pour divertir les visiteurs. Des zones sont souvent aménagées dont des aires de jeux et espaces de détente pour que les familles puissent se reposer et profiter de leur visite.");
      INSERT INTO service(nom, description_serv) VALUES("Services aux Visiteurs", "Le zoo dispose d'un restaurant, d'un café et d'une boutique de souvenirs pour améliorer l'expérience des visiteurs. Nous offrons aussi des services pour les personnes à mobilité réduite pour s'assurer que tous nos visiteurs puissent profiter du zoo.");
      INSERT INTO service(nom, description_serv) VALUES("Services à la carte", "Afin de profiter d'un séjour inoubliable et agréable dans zoo, nous offres un services à la carte pour les personnes désireuses de mieux connaitre nos animaux.");

/* insertion des jeux de données dans la table race */
      INSERT INTO race(label) VALUES('Lion');
      INSERT INTO race(label) VALUES('Chien');
      INSERT INTO race(label) VALUES('Panthere');
      INSERT INTO race(label) VALUES('Panda');
      INSERT INTO race(label) VALUES('Dauphin');
      INSERT INTO race(label) VALUES('Elephant');
      INSERT INTO race(label) VALUES('Tigre');
      INSERT INTO race(label) VALUES('Zebre');
      INSERT INTO race(label) VALUES('Crocodile');
      INSERT INTO race(label) VALUES('Pingouin');
      INSERT INTO race(label) VALUES('Loup');
      INSERT INTO race(label) VALUES('Grenouille');
      INSERT INTO race(label) VALUES('Bouquetin');
      INSERT INTO race(label) VALUES('Marmotte');
      INSERT INTO race(label) VALUES('Vautour');
      INSERT INTO race(label) VALUES('Antilope');
      INSERT INTO race(label) VALUES('Coyote');
      INSERT INTO race(label) VALUES('Faucon');
      INSERT INTO race(label) VALUES('Perroquet');

/* insertion des jeux de données dans la table aliment */
      INSERT INTO aliment(label_aliment) VALUES('Viande');
      INSERT INTO aliment(label_aliment) VALUES('Poisson');
      INSERT INTO aliment(label_aliment) VALUES('Fruit');
      INSERT INTO aliment(label_aliment) VALUES('Légume');
      INSERT INTO aliment(label_aliment) VALUES('Graine');
      INSERT INTO aliment(label_aliment) VALUES('Insecte');
      INSERT INTO aliment(label_aliment) VALUES('Nectar');
      INSERT INTO aliment(label_aliment) VALUES('Herbe');
      INSERT INTO aliment(label_aliment) VALUES('Algues');
      INSERT INTO aliment(label_aliment) VALUES('Miel');
      INSERT INTO aliment(label_aliment) VALUES('Oeuf');
      INSERT INTO aliment(label_aliment) VALUES('Lait');
      INSERT INTO aliment(label_aliment) VALUES('Sang');
      INSERT INTO aliment(label_aliment) VALUES('Mollusque');
      INSERT INTO aliment(label_aliment) VALUES('Crustacé');
      INSERT INTO aliment(label_aliment) VALUES('Champignon');
      INSERT INTO aliment(label_aliment) VALUES('Céréale');
      INSERT INTO aliment(label_aliment) VALUES('Noix');
      INSERT INTO aliment(label_aliment) VALUES('fourage'); 


/* Insertion des jeux de données dans la table habitat */
      INSERT INTO habitat(nom, description, commentaire_habitat, image_id) VALUES('Savane Alsa', "Cet habitat est caractérisé par des prairies ouvertes et des arbres épars, où l'on peut trouver des animaux comme les lions, les éléphants et les girafes. Les enclos sont souvent conçus pour simuler les vastes espaces de la savane africaine","Habitat insalubre.", 1);
      INSERT INTO habitat(nom, description, commentaire_habitat, image_id) VALUES("Marais d\'Annel", "L'habitat aquatique est idéal pour les animaux amphibies et aquatiques, tels que les grenouilles, les crocodiles et certaines espèces d'oiseaux. Il se caractérise par des zones humides avec des étangs et des rivières pour reproduire ces écosystèmes.","Changer d'habitat car barrière sur la point de s'effondre", 2);
      INSERT INTO habitat(nom, description, commentaire_habitat, image_id) VALUES('Forêt Darnien',  "Les habitats de jungle imitent les forêts tropicales denses, offrant un environnement riche en végétation. On y trouve des espèces comme les singes, les oiseaux tropicaux et les reptiles, qui bénéficient de la couverture végétale et des structures verticales","Demande de couverture." , 3);
      INSERT INTO habitat(nom, description, commentaire_habitat, image_id) VALUES('Montagne', "Le zoo inclue des habitats montagneux, où l'on peut observer des animaux adaptés à des altitudes élevées, comme les chèvres de montagne et les léopards des neiges", "Riens à signaler", 4);
      INSERT INTO habitat(nom, description, commentaire_habitat, image_id) VALUES('Batiment Cantini', "Le zoo inclue des habitats montagneux, où l'on peut observer des animaux adaptés à des altitudes élevées, comme les chèvres de montagne et les léopards des neiges", "Site à sécuriser." 5);
      INSERT INTO habitat(nom, description, commentaire_habitat, image_id) VALUES('Espace Aubervilier', "L'enclos du zoo présente un espace vaste et verdoyant, entouré de clôtures naturelles pour imiter l'habitat d'origine des animaux. Des rochers, des arbres et des zones d'ombre offrent refuge et stimulation. On y trouve souvent des lions, zèbres, signes, flamants.", "Rien à signaler!" , 6);
      INSERT INTO habitat(nom, description, commentaire_habitat, image_id) VALUES('Etang Chambort', "Le marais du zoo est un écosystème fascinant, où l'eau douce s'entrelace avec des espaces verdoyants. Des plantes aquatiques, comme des nénuphars et des joncs, poussent le long des rives, créant un habitat idéal. Les visiteurs peuvent y observer des cigognes, grenouilles, tortues, crocodiles.", "Renforcer la protetion des berges", 7);
      INSERT INTO habitat(nom, description, commentaire_habitat, image_id) VALUES('Chambort', "L'habitat de plaine se caractérise par de vastes étendues de terrain plat, souvent recouvertes de prairies, de champs et de zones herbeuses. Les animaux qui y vivent, comme les zèbres, coyotes, antiloppes, faucons, gazèlle et les antilopes, ont besoin d'espace pour se déplacer et se nourrir.", "Arreter les visites afin de permettre des travaux de toitures", 8);
      INSERT INTO habitat(nom, description, commentaire_habitat, image_id) VALUES('Aquaruim Rigobert', "L'habitat de plaine se caractérise par de vastes étendues de terrain plat, souvent recouvertes de prairies, de champs et de zones herbeuses. Les animaux qui y vivent, comme les zèbres, coyotes, antiloppes, faucons, gazèlle et les antilopes, ont besoin d'espace pour se déplacer et se nourrir.", "Rien à signaler.", 9);

/* Insertion des jeux de données dans la table type_habitat */
   INSERT INTO type_habitat(label_type, habitat_id) VALUES('Savane', 1);
    INSERT INTO type_habitat(label_type, habitat_id) VALUES('Marais', 2);
    INSERT INTO type_habitat(label_type, habitat_id) VALUES('Jungle', 3);
    INSERT INTO type_habitat(label_type, habitat_id) VALUES('Montagne', 4); 
    INSERT INTO type_habitat(label_type, habitat_id) VALUES('Cage', 5);
    INSERT INTO type_habitat(label_type, habitat_id) VALUES('Enclos', 6); 
    INSERT INTO type_habitat(label_type, habitat_id) VALUES('Aquatique', 7);
    INSERT INTO type_habitat(label_type, habitat_id) VALUES('Plaine', 8);
    INSERT INTO type_habitat(label_type, habitat_id) VALUES('Aquarium', 9);


     
