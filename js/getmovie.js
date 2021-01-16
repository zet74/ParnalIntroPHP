const Http = new XMLHttpRequest();
const url='http://localhost:8081/api/movies/1';
Http.open("GET", url);
Http.send();
Http.responseType = "json";

Http.onreadystatechange = (e) => {
    const data = Http.response;
    console.log(data);
    console.log(data.affiche)
}
