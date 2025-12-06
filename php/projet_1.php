<?php
// Récupération de l'ID depuis l'URL (ex: details-projet.php?id=1)
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// =================================================================
// BASE DE DONNÉES DES PROJETS
// =================================================================
$projets = [
    1 => [
        "titre" => "HandicapXR - Vision Pro",
        "sous_titre" => "Sensibilisation aux handicaps invisibles via Réalité Mixte",
        "type" => "Application visionOS",
        "technos" => ["Swift", "SwiftUI", "Xcode", "RealityKit"],
        "description" => "Ce projet innovant utilise le casque Apple Vision Pro pour plonger l'utilisateur dans le quotidien de personnes atteintes de handicaps invisibles. L'objectif est de créer de l'empathie en faisant vivre les difficultés réelles (visuelles et cognitives) lors de tâches simples.",
        "details" => [
            "Simulation de pathologies : Glaucome (rétrécissement du champ visuel), DMLA (tâche centrale), Schizophrénie (distorsions sonores et visuelles).",
            "Scénarios interactifs : Préparer un café, lire un journal ou se déplacer dans une pièce tout en subissant les symptômes.",
            "Défi technique : Utilisation des API de RealityKit pour altérer le rendu visuel en temps réel sans provoquer de nausée (motion sickness)."
        ],
        "icon" => "fa-vr-cardboard",
        "couleur" => "text-purple-400"
    ],
    2 => [
        "titre" => "Gestion Association",
        "sous_titre" => "Plateforme web complète pour l'administration bénévole",
        "type" => "Site Web Fullstack",
        "technos" => ["CakePHP", "MySQL", "HTML/CSS", "Bootstrap"],
        "description" => "Développement d'une solution web centralisée pour faciliter l'organisation interne d'une association. Le site remplace les fichiers Excel disparates par une base de données robuste et accessible partout.",
        "details" => [
            "Système d'authentification : Rôles distincts (Administrateur, Gérant, Bénévole) avec des permissions spécifiques.",
            "Gestion des événements : Création, modification et suppression d'événements (CRUD) avec gestion des inscriptions en temps réel.",
            "Base de données : Modélisation complexe des relations entre adhérents, cotisations et participations aux événements."
        ],
        "icon" => "fa-users",
        "couleur" => "text-blue-400"
    ],
    3 => [
        "titre" => "Serious Game Incendie",
        "sous_titre" => "Simulation pédagogique d'évacuation d'urgence",
        "type" => "Jeu Desktop / Éducatif",
        "technos" => ["Java", "Processing", "POO"],
        "description" => "Création d'un 'Serious Game' visant à éduquer les joueurs sur les procédures de sécurité incendie. Le jeu met l'accent sur la coopération entre les 'guides-files' et les personnes à évacuer.",
        "details" => [
            "Mécaniques de jeu : Le joueur doit localiser les civils (cartes), les regrouper et les mener vers la sortie avant que la jauge de fumée ne soit critique.",
            "Intelligence Artificielle : Comportement autonome des foules et propagation dynamique du feu sur la carte.",
            "Algorithmique : Utilisation de pathfinding (recherche de chemin) pour les déplacements des PNJ."
        ],
        "icon" => "fa-fire-extinguisher",
        "couleur" => "text-red-400"
    ],
    4 => [
        "titre" => "Serre Connectée IoT",
        "sous_titre" => "Système autonome de gestion climatique",
        "type" => "IoT & Embarqué",
        "technos" => ["C++", "Arduino", "Capteurs", "RFID"],
        "description" => "Conception et prototypage d'une serre intelligente capable de s'autoréguler pour optimiser la croissance des plantes. Le projet mêle électronique, programmation bas niveau et interface web de contrôle.",
        "details" => [
            "Tracking Solaire : Panneau solaire motorisé qui suit la source lumineuse pour maximiser l'énergie.",
            "Automatisation : Ouverture automatique des aérations selon les seuils d'humidité et de température captés.",
            "Sécurité : Système de verrouillage par badge RFID pour restreindre l'accès à la serre."
        ],
        "icon" => "fa-leaf",
        "couleur" => "text-green-400"
    ],
    5 => [
        "titre" => "Endless Runner",
        "sous_titre" => "Jeu de plateforme dynamique en 2D",
        "type" => "Jeu Vidéo",
        "technos" => ["Godot", "GDScript", "Pixel Art"],
        "description" => "Développement d'un jeu de type 'Runner' infini où la difficulté augmente progressivement. Ce projet m'a permis de maîtriser un moteur de jeu moderne et la logique de boucle de jeu (Game Loop).",
        "details" => [
            "Génération procédurale : Les obstacles et plateformes apparaissent aléatoirement pour une rejouabilité infinie.",
            "Physique et Collisions : Gestion précise des sauts, de la gravité et des hitboxes.",
            "Système de Score : Sauvegarde du High Score et progression visuelle (changement de décor)."
        ],
        "icon" => "fa-gamepad",
        "couleur" => "text-indigo-400"
    ],
    6 => [
        "titre" => "PokéCollection",
        "sous_titre" => "Application mobile de collection gamifiée",
        "type" => "Application Android Native",
        "technos" => ["Kotlin", "Android Studio", "API REST", "Room"],
        "description" => "Une application mobile complète pour les fans de collection. L'utilisateur doit gérer ses ressources pour ouvrir des boosters virtuels et compléter son Pokédex.",
        "details" => [
            "Mécanique Gacha : Système d'ouverture de boosters rechargeable avec le temps (TimerService).",
            "Consommation d'API : Création et connexion à une API REST pour récupérer les données et images des Pokémon.",
            "Missions : Système de quêtes journalières pour gagner de la monnaie virtuelle."
        ],
        "icon" => "fa-mobile-screen",
        "couleur" => "text-yellow-400"
    ]
];

// Si l'ID n'existe pas, on prend le 1 par défaut ou on redirige
$projet = isset($projets[$id]) ? $projets[$id] : $projets[1];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $projet['titre']; ?> - Bastiaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bastiaan-black': '#0a0a0a',
                        'bastiaan-blue': '#1e3a8a',
                        'bastiaan-gold': '#d4af37',
                    },
                    fontFamily: {
                        'heading': ['"Playfair Display"', 'serif'],
                        'body': ['"Lato"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #050505;
            background-image: radial-gradient(circle at 50% 0%, #111827 0%, #000000 80%);
            color: #e5e7eb;
        }
        .text-gold-gradient {
            background: linear-gradient(to right, #bf953f, #fcf6ba, #b38728);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .glass-panel {
            background: rgba(20, 20, 25, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="font-body min-h-screen flex flex-col">

    <!-- Navigation -->
    <nav class="w-full py-6 px-8 flex justify-between items-center bg-black/80 backdrop-blur-md fixed top-0 z-50 border-b border-white/10">
        <a href="index.html" class="text-2xl font-heading font-bold text-bastiaan-gold tracking-widest">BASTIAAN</a>
        <div class="hidden md:flex space-x-6 text-sm uppercase tracking-widest">
            <a href="presentation.php" class="hover:text-bastiaan-gold transition-colors">Présentation</a>
            <a href="projet.php" class="text-bastiaan-gold font-bold">Projets</a>
            <a href="experience.php" class="hover:text-bastiaan-gold transition-colors">Expérience</a>
        </div>
    </nav>

    <!-- Header Projet -->
    <header class="pt-32 pb-12 px-4 relative overflow-hidden">
        <!-- Background Icon Décorative -->
        <div class="absolute top-20 right-10 text-9xl opacity-5 <?php echo $projet['couleur']; ?>">
            <i class="fa-solid <?php echo $projet['icon']; ?>"></i>
        </div>

        <div class="max-w-6xl mx-auto">
            <a href="projet.php" class="inline-flex items-center text-gray-400 hover:text-bastiaan-gold mb-6 transition-colors">
                <i class="fa-solid fa-arrow-left mr-2"></i> Retour aux projets
            </a>
            
            <h1 class="text-4xl md:text-6xl font-heading font-bold text-white mb-4">
                <?php echo $projet['titre']; ?>
            </h1>
            <p class="text-xl text-bastiaan-gold max-w-2xl">
                <?php echo $projet['sous_titre']; ?>
            </p>
        </div>
    </header>

    <!-- Contenu Principal -->
    <main class="flex-grow px-4 pb-20 w-full max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Colonne Gauche : Description Détaillée -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Section Présentation -->
                <section class="glass-panel p-8 rounded-xl border-l-4 border-bastiaan-gold">
                    <h2 class="text-2xl font-heading font-bold text-white mb-6">À propos du projet</h2>
                    <p class="text-gray-300 leading-relaxed text-lg">
                        <?php echo $projet['description']; ?>
                    </p>
                </section>

                <!-- Section Points Clés -->
                <section>
                    <h3 class="text-xl font-heading font-bold text-white mb-4 flex items-center">
                        <i class="fa-solid fa-list-check text-bastiaan-blue mr-3"></i> Fonctionnalités Clés
                    </h3>
                    <div class="space-y-4">
                        <?php foreach($projet['details'] as $detail): ?>
                        <div class="flex items-start bg-gray-900/50 p-4 rounded-lg border border-white/5">
                            <i class="fa-solid fa-check text-bastiaan-gold mt-1 mr-3"></i>
                            <p class="text-gray-400 text-sm"><?php echo $detail; ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </section>
                
                <!-- Placeholder Galerie Images -->
                <section class="mt-8">
                    <h3 class="text-xl font-heading font-bold text-white mb-4">Galerie</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="h-48 bg-gray-800 rounded-lg flex items-center justify-center border border-white/10 group overflow-hidden relative">
                            <i class="fa-regular fa-image text-3xl text-gray-600 group-hover:opacity-0 transition-opacity"></i>
                            <div class="absolute inset-0 bg-bastiaan-blue/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="text-white font-bold">Aperçu 1</span>
                            </div>
                        </div>
                        <div class="h-48 bg-gray-800 rounded-lg flex items-center justify-center border border-white/10 group overflow-hidden relative">
                            <i class="fa-regular fa-image text-3xl text-gray-600 group-hover:opacity-0 transition-opacity"></i>
                             <div class="absolute inset-0 bg-bastiaan-blue/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="text-white font-bold">Aperçu 2</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2 italic">* Images à intégrer plus tard</p>
                </section>
            </div>

            <!-- Colonne Droite : Infos Techniques (Sidebar) -->
            <div class="lg:col-span-1">
                <div class="glass-panel p-6 rounded-xl sticky top-28">
                    <h3 class="text-lg font-bold text-white mb-6 uppercase tracking-wider border-b border-gray-700 pb-2">
                        Fiche Technique
                    </h3>
                    
                    <div class="space-y-6">
                        <!-- Type -->
                        <div>
                            <p class="text-gray-500 text-xs uppercase font-bold mb-1">Type de projet</p>
                            <p class="text-white font-medium"><?php echo $projet['type']; ?></p>
                        </div>

                        <!-- Stack Technique -->
                        <div>
                            <p class="text-gray-500 text-xs uppercase font-bold mb-2">Technologies</p>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach($projet['technos'] as $tech): ?>
                                <span class="px-3 py-1 bg-bastiaan-blue/20 text-blue-300 rounded text-xs border border-bastiaan-blue/30">
                                    <?php echo $tech; ?>
                                </span>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Contexte (Statique pour l'exemple) -->
                        <div>
                            <p class="text-gray-500 text-xs uppercase font-bold mb-1">Contexte</p>
                            <p class="text-white font-medium text-sm">Projet Académique (BUT 3)</p>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="pt-4 border-t border-gray-700 mt-4 flex flex-col gap-3">
                            <a href="#" class="w-full py-3 bg-white text-black font-bold text-center rounded hover:bg-bastiaan-gold transition-colors uppercase text-sm tracking-wider">
                                <i class="fa-brands fa-github mr-2"></i> Voir le code
                            </a>
                            <?php if($id == 2): // Exemple: Lien démo seulement pour le site web ?>
                            <a href="#" class="w-full py-3 border border-white text-white font-bold text-center rounded hover:bg-white/10 transition-colors uppercase text-sm tracking-wider">
                                <i class="fa-solid fa-arrow-up-right-from-square mr-2"></i> Voir le site
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="w-full py-6 text-center text-gray-600 text-sm border-t border-white/5 bg-black">
        <p>&copy; 2023 Bastiaan. Tous droits réservés.</p>
    </footer>

</body>
</html>