import fetch_url from '../url'
import User_Model from '../Model/Utilisateur';

export default class UtilisateurDAO {
    static Inscription() {
        fetch(fetch_url.url + '?action=register&nom=' + User_Model.nom + '&prenom=' + User_Model.prenom + '&phone=' + User_Model.tel + '&mail=' + User_Model.mail + '&login=' + User_Model.login + '&password=' + User_Model.password + '&age=' + User_Model.age)
        .then(response => {
            return response.json()
        })    
        .then(data => {
            return new Utilisateur(data)
        })
    }
}