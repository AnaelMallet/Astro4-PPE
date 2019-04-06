export default class Utilisateur {
    nom = "";
    prenom = "";
    tel = "";
    mail = "";
    login = "";
    password = "";
    age = "";

    constructor(data) {
        this.nom = data.nom;
        this.prenom = data.prenom;
        this.tel = data.tel;
        this.mail = data.mail;
        this.login = data.login;
        this.password = data.password;
        this.age = data.age;
    }
}