# Cahier des Charges - Plateforme Bug Bounty

## 1. Introduction
**HappyHunt Bug Bounty** est une plateforme permettant aux entreprises de publier des programmes de Bug Bounty et aux chercheurs en cybersécurité de signaler des vulnérabilités en échange de récompenses.

### Objectif
Développer une plateforme sécurisée et intuitive pour faciliter la collaboration entre entreprises et chercheurs en cybersécurité.

---

## 2. Acteurs du Système
- **Chercheurs en cybersécurité** : Signalent des failles et reçoivent des récompenses.
- **Entreprises** : Publient des programmes de Bug Bounty et examinent les rapports.
- **Administrateurs** : Gèrent les utilisateurs et assurent la modération.

---

## 3. Fonctionnalités Principales

### 3.1. Authentification et Gestion des Comptes
- Inscription et connexion sécurisée (email, mot de passe, OAuth).
- Gestion des profils (photo, bio, scores, historique des contributions).

### 3.2. Gestion des Programmes de Bug Bounty
- Les entreprises peuvent créer, modifier et supprimer des programmes.
- Description du programme, scope (domaines testables), niveaux de récompense.
- Statut du programme (ouvert, fermé, en pause).

### 3.3. Soumission et Gestion des Rapports de Vulnérabilités
- Formulaire de soumission d'une vulnérabilité (titre, description, PoC, impact, niveau de sévérité).
- Suivi de l'état d'un rapport (soumis, en cours de révision, validé, refusé).

### 3.4. Attribution des Récompenses
- Système de récompenses selon la sévérité des failles (Low, Medium, High, Critical).
- Historique des paiements et gestion des transactions (Stripe).

### 3.5. Classement et Gamification
- Système de points et badges pour encourager la participation.
- Leaderboard affichant les meilleurs chercheurs.

### 3.6. Sécurité et Conformité
- Chiffrement des données sensibles.
- Protection contre les attaques courantes (CSRF, XSS, SQL Injection).

### 3.7. Red Room (Salles de Discussion Privées pour Hackers)
- Les hackers peuvent créer des Red Rooms, qui sont des groupes de discussion privés.
- Chaque Red Room a un nom, une description et des membres sélectionnés par son créateur.
- Les discussions sont sécurisées et chiffrées.
- Possibilité d'envoyer des messages en temps réel et de partager des ressources.
- Seuls les hackers peuvent créer et rejoindre ces espaces.
- Fonctionnalités de gestion de groupe : ajout/suppression de membres, suppression du groupe par le créateur.

---

## 4. Technologies Utilisées
- **Frontend** : React.js
- **Backend** : PHP (Laravel)
- **Base de données** : PostgreSQL

---

## 5. Contraintes et Exigences
- Scalabilité pour supporter un grand nombre d'utilisateurs.
- Interface responsive et UX optimisée.
- Respect des normes de cybersécurité et protection des données.

---

## 6. Structure du Frontend

### 6.1. Pages Principales
- **🏠 Page d'Accueil (`/`)**
  - Présentation de la plateforme et CTA d'inscription.
  - Explication du fonctionnement.
  - Affichage des top hackers et entreprises partenaires.

- **🔑 Page d’Authentification (`/login`, `/register`)**
  - Formulaire sécurisé d’inscription et connexion.
  - Option de récupération de mot de passe.
  - Connexion via OAuth (GitHub, Google).

- **📊 Dashboard**
  - Pour les chercheurs : Liste des programmes actifs, historique des rapports.
  - Pour les entreprises : Gestion des programmes et rapports soumis.

- **🎯 Page Liste des Programmes (`/programs`)**
  - Filtrage par récompense, sévérité et entreprise.
  - Accès rapide aux détails.

- **📜 Page Détails d’un Programme (`/program/:id`)**
  - Informations sur le programme et le scope.
  - Récompenses détaillées.

- **🚀 Page Soumission d’un Rapport (`/report/new`)**
  - Formulaire détaillé avec pièces jointes.
  - Suivi du statut.

- **🏆 Page Classement (`/leaderboard`)**
  - Affichage des meilleurs hackers avec leurs scores.

- **⚙️ Page Profil (`/profile/:id`)**
  - Informations sur le hacker/entreprise.
  - Statistiques.

- **🛠 Page Admin (`/admin`)**
  - Gestion des utilisateurs et modération.
  - Contrôle des programmes et rapports soumis.

- **🔴 Page Red Room (`/redroom`)**
  - Interface pour créer et gérer des groupes de discussion privés entre hackers.
  - Liste des Red Rooms accessibles avec options de filtrage.
  - Interface sécurisée et chiffrée.

### 6.2. UX et Design
- Interface moderne avec dark mode.
- Expérience fluide avec React et API Laravel.
- Design responsive et optimisé.

---

## 7. Conclusion
Ce projet vise à fournir une plateforme sécurisée et intuitive pour favoriser la collaboration entre chercheurs en cybersécurité et entreprises. Son succès repose sur une UX efficace, une sécurité renforcée et une gestion transparente des programmes de Bug Bounty.