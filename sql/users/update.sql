UPDATE users
SET first_name = :first_name,
    last_name  = :last_name,
    email      = :email,
    password   = :password,
    deleted    = :deleted
WHERE id = :id;
