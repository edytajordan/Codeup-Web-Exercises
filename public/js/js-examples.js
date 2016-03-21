(function() {
    "use strict";
    var favoriteMovies = ['The Shawshank Redemption', 'The Color Purple', 'Coming to America', 'Zoolander', "It's Complicated", 'The Breakfast Club', 'Pootie Tang', 'Star Wars: A New Hope', 'Interstellar', 'The Hunt for Red October'];
    function logMovies(movieArray) {
        console.log('Here is the list of my favorite movies:');
        var myFavorite = movieArray.shift();
        var leastFav = movieArray.pop();
        console.log("My all time favorite movie is : " + myFavorite);
        console.log("My least favorite movie is : " + leastFav);
        console.log("Some other movies are " + movieArray);
    }

    // Sort your favorite movies alphabetically
    favoriteMovies.sort();
    // console.log(favoriteMovies);

    // Use .indexOf() to find your number one favorite movie
    var index = favoriteMovies.indexOf('The Color Purple');
    // console.log(index);

    // Use .splice() to take that movie out of the array
    var myFavoriteMovie = favoriteMovies.splice(index, 1);
    // console.log(myFavoriteMovie);

    // Put your favorite movie back in at the start of the array
    favoriteMovies.unshift(myFavoriteMovie[0]);
   

    // Repeat the above steps for your least favorite movie; put it at the end
    var index2 = favoriteMovies.indexOf("It's Complicated");
 

    var leastFavorite = favoriteMovies.splice(index2, 1);
    

    favoriteMovies.push(leastFavorite[0]);
    // logMovies();

    // Create a function to console.log() your favorite movies.
        // DO NOT VIOLATE SCOPE! Pass your favoriteMovies array in as a parameter
        // Your function should output:
        // "My all time favorite movie is [your favorite movie here]"
        // "My least favorite movie is [your least favorite movie here]"
        // "Some other movies are [the rest of the movies array with comma space between them]"
        // You should not output any movies twice.

   logMovies(favoriteMovies);

})();