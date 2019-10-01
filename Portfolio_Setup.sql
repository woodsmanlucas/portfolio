IF OBJECT_ID('Project', 'U')    
    IS NOT NULL DROP TABLE Project;
IF OBJECT_ID('Skill', 'U')    
    IS NOT NULL DROP TABLE Skill;
IF OBJECT_ID('ProjectSkill', 'U')    
    IS NOT NULL DROP TABLE Project;
IF OBJECT_ID('Technology', 'U')    
    IS NOT NULL DROP TABLE Technology;
IF OBJECT_ID('ProjectTechnology', 'U')    
    IS NOT NULL DROP TABLE ProjectTechnology;
GO


CREATE TABLE Project (
    projectID      INTEGER,         
    projectName    VARCHAR(100),
	gitHubLink		VARCHAR(100),
	siteLink		VARCHAR(100),
	img				VARCHAR(100),
	descrpt			VARCHAR(100)
    PRIMARY KEY (projectID)     
);
CREATE TABLE Tech (
	techID INTEGER,
	tech  VARCHAR(20),
	PRIMARY KEY (techID)
);
CREATE TABLE ProjectTechnology (
	projectID INTEGER,
	techID	INTEGER,
	rating INTEGER
    FOREIGN KEY(techID) REFERENCES Tech(techID),
	FOREIGN KEY(projectID) REFERENCES Project(projectID)
);
CREATE TABLE Skill (
	skillID INTEGER,
	skill  VARCHAR(20)
	PRIMARY KEY (skillID)
);
CREATE TABLE ProjectSkill (
	projectID INTEGER,
	skillID INTEGER
    FOREIGN KEY(skillID) REFERENCES Skill(skillID),
	FOREIGN KEY(projectID) REFERENCES Project(projectID)
);
GO

INSERT INTO Project VALUES (1, 'Tic-Tac-Toe', 'https://github.com/woodsmanlucas/Tic-Tac-Toe', 'https://woodsmanlucas.github.io/Tic-Tac-Toe/', './tic-tac-toe.svg', 'a simple game of tic tac toe');
INSERT INTO Project VALUES (2, 'Pong', 'https://github.com/woodsmanlucas/Pong', 'https://woodsmanlucas.github.io/Pong/', './pong.svg', 'a variant on the game of pong');
INSERT INTO Project VALUES (3, 'Black Jack', 'https://github.com/woodsmanlucas/BlackJack', 'https://woodsmanlucas.github.io/BlackJack/', './BlackJack.svg', 'a game of Black Jack');


INSERT INTO Tech VALUES (1, 'Javascript');
INSERT INTO Tech VALUES (2, 'HTML/CSS');
INSERT INTO Tech VALUES (3, 'jQuery');
INSERT INTO Tech VALUES (4, 'Phaser.js');

INSERT INTO ProjectTechnology VALUES (1, 1, 4);
INSERT INTO ProjectTechnology VALUES (1, 2, 1);
INSERT INTO ProjectTechnology VALUES (1, 3, 3);

INSERT INTO ProjectTechnology VALUES (2, 1, 3);
INSERT INTO ProjectTechnology VALUES (2, 4, 4);

INSERT INTO ProjectTechnology VALUES (3, 1, 4);
INSERT INTO ProjectTechnology VALUES (3, 2, 3);

GO

SELECT * FROM Project;
SELECT * FROM Tech;

