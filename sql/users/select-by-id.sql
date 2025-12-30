SELECT id,
       first_name,
       last_name,
       email,
       password,
       deleted,
       created,
       updated
FROM users
WHERE deleted = :deleted
  AND id = :id;
