-- Give me the names of all the actors in the movie 'Die Another Day'. Please also make sure actor names are in this format:  <firstname> <lastname>  (seperated by single space).
SELECT concat (first,' ',last)  ActorName
FROM Actor A, Movie M, MovieActor MA
WHERE A.id = MA.aid AND M.id = MA.mid
      AND title = 'Die Another Day' ;

-- Give me the count of all the actors who acted in multiple movies.
SELECT COUNT(*) COUNT_NUMBER
FROM (SELECT DISTINCT aid
      FROM MovieActor
      GROUP BY aid
      HAVING COUNT(mid)>1) MA;

-- Select the names of the directors who have directed more than 2 genres of movies
SELECT concat (first,' ',last) DirectorName
FROM Director D, MovieGenre MG, MovieDirector MD
WHERE id = did AND MD.mid = MG.mid
GROUP BY id
HAVING COUNT(DISTINCT genre) > 2;

