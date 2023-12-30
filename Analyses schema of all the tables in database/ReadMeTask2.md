**Composite Key**

1. A composite key in a database is a key that consists of two or more columns to identify a record within a table uniquely. Instead of a single column, a composite key uses a combination of multiple columns to create a unique identifier for each row in the table.

2. For instance, imagine a table that stores information about students in a school. A single column like "Student ID" might not be enough to guarantee uniqueness because there could be multiple students with the same name. In such cases, a composite key could be created by combining two columns, "Student ID" and "Date of Birth". These columns can uniquely identify each student in the database, ensuring that no two students have the same combination of "Student ID" and "Date of Birth".

3. Composite keys offer more precision in identifying records and can reflect the real-world uniqueness requirements of the data being stored in a database. They can consist of any number of columns needed to create a unique identifier for a row within a table.

**Real Time Example**

   We have a table for tracking book borrowings. In this case, a composite key could be used to uniquely identify each borrowing record.

Let's say we have a table named **Borrowings** with the following columns:

1. **BookID:** Represents the ID of the book being borrowed.

2. **UserID:** Represents the ID of the user borrowing the book.

3. **BorrowDate:** Represents the date when the book was borrowed.
   
Now, using a single column as a primary key might not suffice because multiple users can borrow the same book on the same day. To ensure each borrowing record is uniquely identified, we can create a composite key using multiple columns, such as BookID, UserID, and BorrowDate.
