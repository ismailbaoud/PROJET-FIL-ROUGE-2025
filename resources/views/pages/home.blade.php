@extends('layouts.app')

@Section('main')
    <main>

        <div class="flex items-center justify-between w-[100%] bg-gradient-to-br from-white via-white via-50% to-green-700 p-20">
            <div class="max-w-xxl">
                <h1 class="text-6xl font-extrabold text-gray-900 leading-tight">
                    Secure the Digital Frontier <br> with Elite Hunters
                </h1>
                <p class="text-gray-600 mt-6 text-xl max-w-xl">
                    Join our global community of cyber hunters tracking down vulnerabilities and protecting the digital
                    ecosystem.
                </p>
                <div class="mt-10 space-x-8">
                    <button
                        class="bg-black text-white px-10 py-4 text-xl rounded-lg font-semibold  hover:bg-gray-800 transition">
                        Join the Hunt
                    </button>
                    <button
                        class="border-2 border-gray-800 px-10 py-4 text-xl rounded-lg font-semibold  hover:bg-gray-800 hover:text-white transition">
                        Watch Demo
                    </button>
                </div>
            </div>
            <div class="relative w-96 h-96 flex items-center justify-center rounded-full" style="background-image: url(https://img.freepik.com/vecteurs-libre/recherche-cyber-bogues_78370-3590.jpg?ga=GA1.1.1752080842.1741951497&semt=ais_hybrid)">
                <div class="absolute w-80 h-80 border-4 border-gray-300 rounded-full"></div>
                <div class="absolute w-64 h-64 border-4 border-gray-400 rounded-full"></div>
                <div class="absolute w-48 h-48 border-4 border-gray-600 rounded-full"></div>
            </div>
        </div>


        <div>
            <h2 class="text-4xl font-extrabold m-20 text-gray-900 mb-12 flex items-center space-x-3">
                <span class="w-full text-center"><i class="fa-solid fa-rocket"></i> Comment ça marche</span>
            </h2>

            <div class="flex justify-center space-x-10 w-full">
                <div class="w-[30%] bg-white p-12 rounded-2xl  border border-gray-300 text-center">
                    <div class="text-4xl font-bold mb-4"><i class="fa-solid fa-plus-minus"></i></div>
                    <h3 class="text-xl font-bold text-gray-900">S'inscrire</h3>
                    <p class="text-gray-600 mt-2 text-lg">
                        Créez votre compte et complétez votre profil de hacker éthique.
                    </p>
                </div>

                <div class="w-[30%] bg-white p-12 rounded-2xl  border border-gray-300 text-center">
                    <div class="text-4xl font-bold mb-4"><i class="fa-solid fa-bug"></i></div>
                    <h3 class="text-xl font-bold text-gray-900">Trouver des failles</h3>
                    <p class="text-gray-600 mt-2 text-lg">
                        Explorez les programmes et découvrez des vulnérabilités.
                    </p>
                </div>

                <div class="w-[30%] bg-white p-12 rounded-2xl  border border-gray-300 text-center">
                    <div class="text-4xl font-bold mb-4"><i class="fa-solid fa-money-bill-wave"></i></div>
                    <h3 class="text-xl font-bold text-gray-900">Obtenir des récompenses</h3>
                    <p class="text-gray-600 mt-2 text-lg">
                        Recevez des primes pour chaque vulnérabilité validée.
                    </p>
                </div>
            </div>
        </div>
        <div>
            <h2 class="text-4xl text-center m-20 font-extrabold text-gray-900 mb-2">Cyberwarriors' Hall of Fame</h2>
            <p class="text-gray-600 text-lg mb-10 text-center">Where legends are forged in the digital battleground</p>

            <div class="flex justify-center space-x-8 w-full">
                <div class="w-[30%] bg-white p-6 rounded-2xl  border border-gray-300 text-center relative">
                    <div class="absolute top-3 right-4 text-2xl font-bold text-gray-400">2</div>
                    <div class="w-20 h-20 mx-auto mb-4"><img class="rounded-full w-20 h-20"
                            src="data:image/jpeg;base64,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"
                            alt=""></div>
                    <h3 class="text-xl font-bold text-gray-900">ZeroDay</h3>
                    <p class="text-gray-600">Stealth Master</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">89,450</p>
                </div>

                <div class="w-[30%] bg-white p-8 rounded-2xl shadow-xl border border-gray-300 text-center relative">
                    <div class="absolute top-3 right-4 text-2xl font-bold text-gray-600">1</div>
                    <div class="w-24 h-24 mx-auto   mb-4"><img class="w-20 h-20  rounded-full"
                            src="data:image/jpeg;base64,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"
                            alt=""></div>
                    <h3 class="text-xl font-bold text-gray-900">HappyHunter</h3>
                    <p class="text-gray-600">Stealth Master</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">125,780</p>
                </div>

                <div class="w-[30%] bg-white p-6 rounded-2xl  border border-gray-300 text-center relative">
                    <div class="absolute top-3 right-4 text-2xl font-bold text-gray-400">3</div>
                    <div class="w-20 h-20 mx-auto   mb-4"><img class="w-20 h-20  rounded-full"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdUTkir81StyrXKYp5Ael760pRFd7gKmxpHt2cIPoknb5Bt8Tp4mhd4AOPlSsjFQgoQQo&usqp=CAU"
                            alt=""></div>
                    <h3 class="text-xl font-bold text-gray-900">MrRobot</h3>
                    <p class="text-gray-600">Expert BlackHat</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">76,320</p>
                </div>
            </div>

            <div class=" mx-20 mt-30">
                <h1 class="text-3xl font-bold text-center mb-5 ">Rapports Bug Bounty</h1>
                <p class="text-gray-500 text-center mb-5">Consultez et gérez les rapports de vulnérabilité</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                        <div class="flex justify-between items-center">
                            <span
                                class="text-gray-600 font-semibold text-sm bg-gray-100 px-3 py-1 rounded-full">Faible</span>
                            <span
                                class="px-3 py-1 text-gray-700 bg-gray-100 border border-gray-300 rounded-full text-xs">Résolu</span>
                        </div>

                        <h2 class="text-xl font-semibold mt-4 text-gray-800">Exposition des clés API dans le code source
                        </h2>
                        <p class="text-gray-500 text-sm">Signalé par <span
                                class="font-medium text-gray-700">ethical_hacker_02</span> • il y a 2 semaines</p>

                        <div class="mt-4 flex items-center gap-3">
                            <img src="https://i.pravatar.cc/40?img=5" alt="Hunter Avatar"
                                class="w-10 h-10 rounded-full border border-gray-300">
                            <div>
                                <p class="text-gray-800 font-semibold">ethical_hacker_02</p>
                                <p class="text-gray-500 text-sm">Chasseur Niveau 1</p>
                            </div>
                        </div>

                        <div class="mt-5">
                            <p class="text-gray-700 font-semibold">Type de vulnérabilité</p>
                            <p class="text-gray-600">Exposition des clés API (CWE-798)</p>
                        </div>

                        <div class="mt-4">
                            <p class="text-gray-700 font-semibold">Sévérité</p>
                            <div class="w-full bg-gray-200 rounded-full h-2 relative">
                                <div class="bg-gray-300 h-2 rounded-full" style="width: 25%;"></div>
                            </div>
                            <p class="text-gray-600 text-sm mt-1">3.0 / 10</p>
                        </div>

                        <div class="mt-4">
                            <p class="text-gray-700 font-semibold">Impact</p>
                            <p class="text-gray-600">Les clés API sensibles exposées dans le code source peuvent être
                                utilisées de manière malveillante</p>
                        </div>

                         <div>
                            <div class="mt-6 flex justify-between items-center">
                                <p class="text-gray-600 font-semibold text-sm">Résolu</p>
                                <button
                                    class="bg-gray-600 text-white px-5 py-2 rounded-lg text-sm font-medium shadow-sm hover:bg-gray-700 transition">
                                    Voir le rapport
                                </button>
                            </div>

                            <p class="text-gray-400 text-xs mt-4">Mis à jour il y a 1 semaine</p>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                        <div class="flex justify-between items-center">
                            <span
                                class="text-gray-600 font-semibold text-sm bg-gray-100 px-3 py-1 rounded-full">Moyenne</span>
                            <span class="px-3 py-1 text-gray-700 bg-gray-100 border border-gray-300 rounded-full text-xs">En
                                cours</span>
                        </div>

                        <h2 class="text-xl font-semibold mt-4 text-gray-800">Injection SQL via formulaire de recherche</h2>
                        <p class="text-gray-500 text-sm">Signalé par <span
                                class="font-medium text-gray-700">ethical_hacker_01</span> • il y a 3 jours</p>

                        <div class="mt-4 flex items-center gap-3">
                            <img src="https://i.pravatar.cc/40?img=3" alt="Hunter Avatar"
                                class="w-10 h-10 rounded-full border border-gray-300">
                            <div>
                                <p class="text-gray-800 font-semibold">ethical_hacker_01</p>
                                <p class="text-gray-500 text-sm">Chasseur Niveau 2</p>
                            </div>
                        </div>

                        <div class="mt-5">
                            <p class="text-gray-700 font-semibold">Type de vulnérabilité</p>
                            <p class="text-gray-600">Injection SQL (CWE-89)</p>
                        </div>

                        <div class="mt-4">
                            <p class="text-gray-700 font-semibold">Sévérité</p>
                            <div class="w-full bg-gray-200 rounded-full h-2 relative">
                                <div class="bg-gray-400 h-2 rounded-full" style="width: 50%;"></div>
                            </div>
                            <p class="text-gray-600 text-sm mt-1">5.6 / 10</p>
                        </div>

                        <div class="mt-4">
                            <p class="text-gray-700 font-semibold">Impact</p>
                            <p class="text-gray-600">Exécution de requêtes malveillantes permettant d'accéder à des données
                                sensibles</p>
                        </div>

                        <div class="mt-6 flex justify-between items-center">
                            <p class="text-gray-600 font-semibold text-sm">En attente</p>
                            <button
                                class="bg-gray-600 text-white px-5 py-2 rounded-lg text-sm font-medium shadow-sm hover:bg-gray-700 transition">
                                Voir le rapport
                            </button>
                        </div>

                        <p class="text-gray-400 text-xs mt-4">Mis à jour il y a 2 jours</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                        <div class="flex justify-between items-center">
                            <span
                                class="text-gray-600 font-semibold text-sm bg-gray-100 px-3 py-1 rounded-full">Élevé</span>
                            <span
                                class="px-3 py-1 text-gray-700 bg-gray-100 border border-gray-300 rounded-full text-xs">En
                                cours</span>
                        </div>

                        <h2 class="text-xl font-semibold mt-4 text-gray-800">Contournement d’authentification via OAuth
                        </h2>
                        <p class="text-gray-500 text-sm">Signalé par <span
                                class="font-medium text-gray-700">ethical_hacker</span> • il y a 1 semaine</p>

                        <div class="mt-4 flex items-center gap-3">
                            <img src="https://i.pravatar.cc/40" alt="Hunter Avatar"
                                class="w-10 h-10 rounded-full border border-gray-300">
                            <div>
                                <p class="text-gray-800 font-semibold">ethical_hacker</p>
                                <p class="text-gray-500 text-sm">Chasseur Niveau 3</p>
                            </div>
                        </div>

                        <div class="mt-5">
                            <p class="text-gray-700 font-semibold">Type de vulnérabilité</p>
                            <p class="text-gray-600">Contournement d’authentification (CWE-287)</p>
                        </div>

                        <div class="mt-4">
                            <p class="text-gray-700 font-semibold">Sévérité</p>
                            <div class="w-full bg-gray-200 rounded-full h-2 relative">
                                <div class="bg-gray-500 h-2 rounded-full" style="width: 75%;"></div>
                            </div>
                            <p class="text-gray-600 text-sm mt-1">7.5 / 10</p>
                        </div>

                        <div class="mt-4">
                            <p class="text-gray-700 font-semibold">Impact</p>
                            <p class="text-gray-600">Prise de contrôle du compte via manipulation OAuth</p>
                        </div>

                        <div>
                            <div class="mt-6 flex justify-between items-center">
                                <p class="text-gray-600 font-semibold text-sm">En attente</p>
                                <button
                                    class="bg-gray-600 text-white px-5 py-2 rounded-lg text-sm font-medium shadow-sm hover:bg-gray-700 transition">
                                    Voir le rapport
                                </button>
                            </div>

                            <p class="text-gray-400 text-xs mt-4">Mis à jour il y a 5 jours</p>
                        </div>
                    </div>

                </div>
            </div>

    </main>
@endsection
