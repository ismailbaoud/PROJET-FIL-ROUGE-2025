@extends('layouts.app')

@Section('main')
    <main class="">

        <div class="flex items-center justify-between w-[100%] bg-gradient-to-br from-white via-white via-30% to-[#E8F5E9] p-20">
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
                        <a href="/register_entreprise">For Companys</a>
                        
                    </button>
                </div>
            </div>
            <div class="relative w-[1000px] h-full flex items-center justify-center " style="background-image: url()">
                <img src="{{ asset('images/bug.svg') }}" alt="">

            </div>
        </div>


        <div class="bg-gradient-to-tr from-white via-white via-30% to-[#E8F5E9] pb-20">
            <h2 class="text-4xl font-extrabold p-30 text-gray-900 flex items-center space-x-3">
                <span class="w-full text-center"><i class="fa-solid fa-rocket"></i> Comment ça marche</span>
            </h2>

            <div class="flex justify-center space-x-10 w-full">
                <!-- Card 1 -->
                <div
                    class="w-[30%] bg-gradient-to-br from-gray-100 to-gray-200 p-8 rounded-2xl border border-gray-300 shadow-lg hover:shadow-gray-400 transition-all duration-300 text-center">
                    <div
                        class="text-5xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-teal-400">
                        <i class="fa-solid fa-user-secret"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">
                        S'inscrire
                    </h3>
                    <p class="text-gray-600 mt-2 text-lg leading-relaxed">
                        Créez votre compte et complétez votre profil de hacker éthique.
                    </p>
                    <button
                        class="mt-6 px-6 py-3 bg-gradient-to-r from-blue-400 to-teal-400 text-white font-semibold rounded-lg hover:from-blue-500 hover:to-teal-500 transition-all duration-300">
                        Commencer
                    </button>
                </div>

                <!-- Card 2 -->
                <div
                    class="w-[30%] bg-gradient-to-br from-gray-100 to-gray-200 p-8 rounded-2xl border border-gray-300 shadow-lg hover:shadow-gray-400 transition-all duration-300 ease-in-out text-center">
                    <div
                        class="text-6xl font-extrabold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-teal-400">
                        <i class="fa-solid fa-bug"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">
                        Analyse des Vulnérabilités
                    </h3>
                    <p class="text-gray-600 mt-2 text-lg leading-relaxed">
                        Explorez nos programmes pour déceler les failles critiques.
                    </p>
                    <button
                        class="mt-6 px-6 py-3 bg-gradient-to-r from-green-400 to-teal-400 text-white font-semibold rounded-lg hover:from-green-500 hover:to-teal-500 transition-all duration-300">
                        Commencer
                    </button>
                </div>

                <!-- Card 3 -->
                <div
                    class="w-[30%] bg-gradient-to-br from-gray-100 to-gray-200 p-8 rounded-2xl border border-gray-300 shadow-lg hover:shadow-gray-400 transition-all duration-300 ease-in-out text-center">
                    <div
                        class="text-6xl font-extrabold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-indigo-400">
                        <i class="fa-solid fa-trophy"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">
                        Obtenir des récompenses
                    </h3>
                    <p class="text-gray-600 mt-2 text-lg leading-relaxed">
                        Recevez des primes pour chaque vulnérabilité validée.
                    </p>
                    <button
                        class="mt-6 px-6 py-3 bg-gradient-to-r from-purple-400 to-indigo-400 text-white font-semibold rounded-lg hover:from-purple-500 hover:to-indigo-500 transition-all duration-300">
                        Commencer
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-white via-white via-50% to-[#E8F5E9]">
                <h2 class="text-4xl text-center p-20 font-extrabold text-gray-900 mb-5">Cyberwarriors' Hall of Fame</h2>
                <p class="text-gray-600 text-lg mb-10 text-center mb-30">Where legends are forged in the digital
                    battleground</p>


                <div class="flex justify-center space-x-8 w-full">
                    <div class="w-[30%] bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center relative">
                        <div class="absolute top-3 right-4 text-2xl font-bold text-gray-400">2</div>
                        <div class="w-20 h-20 mx-auto mb-4 bg-gray-200 rounded-full"></div>
                        <h3 class="text-xl font-bold text-gray-700">ZeroDay</h3>
                        <p class="text-gray-500">Stealth Master</p>
                        <p class="text-3xl font-bold text-gray-700 mt-2">89,450</p>
                    </div>

                    <div class="w-[30%] bg-gray-50 p-8 rounded-2xl border border-gray-200 text-center relative">
                        <div class="absolute top-3 right-4 text-2xl font-bold text-gray-600">1</div>
                        <div class="w-24 h-24 mx-auto mb-4 bg-gray-200 rounded-full"></div>
                        <h3 class="text-xl font-bold text-gray-700">HappyHunter</h3>
                        <p class="text-gray-500">Stealth Master</p>
                        <p class="text-3xl font-bold text-gray-700 mt-2">125,780</p>
                    </div>

                    <div class="w-[30%] bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center relative">
                        <div class="absolute top-3 right-4 text-2xl font-bold text-gray-400">3</div>
                        <div class="w-20 h-20 mx-auto mb-4 bg-gray-200 rounded-full"></div>
                        <h3 class="text-xl font-bold text-gray-700">MrRobot</h3>
                        <p class="text-gray-500">Expert BlackHat</p>
                        <p class="text-3xl font-bold text-gray-700 mt-2">76,320</p>
                    </div>
                </div>

        </div>
        <div class=" px-20 pb-20 pt-30 flex-1 bg-gradient-to-tr from-white via-white via-30% to-[#E8F5E9]">
            <div class="mt-20 p-20">
                <h1 class="text-3xl font-bold text-center mb-5  ">Rapports Bug Bounty</h1>
                <p class="text-gray-500 text-center mb-5 ">Consultez et gérez les rapports de vulnérabilité</p>
            </div>


            <div class="grid grid-cols-2 gap-44">

                <div class="flex justify-center items-center">
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                        <div class="flex justify-between items-center">
                            <span
                                class="text-gray-600 font-semibold text-sm bg-gray-100 px-3 py-1 rounded-full">Élevé</span>
                            <span class="px-3 py-1 text-gray-700 bg-gray-100 border border-gray-300 rounded-full text-xs">En
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
                <div class="">
                    <img src="{{ asset('images/Cyber attack-bro.svg') }}" alt="">

                </div>
            </div>

        </div>
        </div>
        <div class="bg-white shadow-lg rounded-xl p-8 text-center w-full bg-gradient-to-tr from-white via-white via-90% to-[#E8F5E9]">
            <div class="flex justify-center items-center mb-4">
                <div class="w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
                    ✓
                </div>
            </div>
            <h2 class="text-xl font-semibold text-gray-700 mb-20">Protecting the world's top innovators</h2>
            <div class="grid grid-cols-3 sm:grid-cols-6 gap-6 mt-6">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Salesforce.com_logo.svg/512px-Salesforce.com_logo.svg.png?20210504050649"
                    alt="Salesforce" class="h-10 mx-auto">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Uber_logo_2018.svg/800px-Uber_logo_2018.svg.png?20180914002846"
                    alt="Uber" class="h-10 mx-auto">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Zoom_Communications_Logo.svg/320px-Zoom_Communications_Logo.svg.png"
                    alt="Zoom" class="h-10 mx-auto">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/2024_Spotify_Logo.svg/512px-2024_Spotify_Logo.svg.png?20240618230019"
                    alt="Shopify" class="h-10 mx-auto">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/320px-PayPal.svg.png"
                    alt="PayPal" class="h-10 mx-auto">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Adobe_logo_and_wordmark_%282017%29.svg/512px-Adobe_logo_and_wordmark_%282017%29.svg.png?20200221114020"
                    alt="Adobe" class="h-10 mx-auto">
            </div>
        </div>

    </main>
@endsection
