CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL,
  email TEXT NOT NULL,
  description TEXT NOT NULL
);

INSERT INTO users (name, email, description) VALUES ('John Doe', 'john.doe@template.git', 'This account is used for testing purposes.');
INSERT INTO users (name, email, description) VALUES ('Jane Doe', 'jane.doe@template.git', 'This account is also used for testing purposes.');