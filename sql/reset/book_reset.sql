--
-- Reset book
--

DELETE FROM `Book`;

INSERT INTO `Book` (`title`, `author`, `image`) VALUES
    ("In Search of Lost Time", "Marcel Proust", "In_Search_of_Lost_Time.jpg"),
    ("Ulysses", "James Joyce", "Ulysses.jpg"),
    ("Don Quixote", "Miguel de Cervantes", "Don_Quixote.jpg"),
    ("The Great Gatsby ", "F. Scott Fitzgerald", "The_Great_Gatsby.jpg"),
    ("Moby Dick", "Herman Melville", "Moby_Dick.jpg")
;

SELECT * FROM `Book`;
