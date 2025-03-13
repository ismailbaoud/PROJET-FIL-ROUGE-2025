@extends('layouts.app')

@Section('main')
    <main>
        <div class="flex items-center justify-between w-[100%] bg-gray-100 p-20">
            <div class="max-w-xl">
                <h1 class="text-6xl font-extrabold text-gray-900 leading-tight">
                    Secure the Digital Frontier <br> with Elite Hunters
                </h1>
                <p class="text-gray-600 mt-6 text-xl">
                    Join our global community of cyber hunters tracking down vulnerabilities and protecting the digital
                    ecosystem.
                </p>
                <div class="mt-10 space-x-8">
                    <button
                        class="bg-black text-white px-10 py-4 text-xl rounded-lg font-semibold shadow-lg hover:bg-gray-800 transition">
                        Join the Hunt
                    </button>
                    <button
                        class="border-2 border-gray-800 px-10 py-4 text-xl rounded-lg font-semibold shadow-lg hover:bg-gray-800 hover:text-white transition">
                        Watch Demo
                    </button>
                </div>
            </div>
            <div class="relative w-96 h-96 flex items-center justify-center">
                <div class="absolute w-80 h-80 border-4 border-gray-300 rounded-full"></div>
                <div class="absolute w-64 h-64 border-4 border-gray-400 rounded-full"></div>
                <div class="absolute w-48 h-48 border-4 border-gray-600 rounded-full"></div>
            </div>
        </div>

        <div class="mt-10">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-12 flex items-center space-x-3">
                <span class="w-full text-center mt-10">🚀 Comment ça marche</span>
            </h2>

            <div class="flex justify-between p-10 w-full">
                <div class="w-[30%] bg-white py-20 rounded-2xl border border-gray-300 text-center">
                    <div class="text-4xl font-bold mb-4">➕</div>
                    <h3 class="text-xl font-bold text-gray-900">S'inscrire</h3>
                    <p class="text-gray-600 mt-2 text-lg">
                        Créez votre compte et complétez votre profil de hacker éthique.
                    </p>
                </div>

                <div class="w-[30%] bg-white py-20 rounded-2xl  border border-gray-300 text-center">
                    <div class="text-4xl font-bold mb-4">🐞</div>
                    <h3 class="text-xl font-bold text-gray-900">Trouver des failles</h3>
                    <p class="text-gray-600 mt-2 text-lg">
                        Explorez les programmes et découvrez des vulnérabilités.
                    </p>
                </div>

                <div class="w-[30%] bg-white py-20 rounded-2xl  border border-gray-300 text-center">
                    <div class="text-4xl font-bold mb-4">💰</div>
                    <h3 class="text-xl font-bold text-gray-900">Obtenir des récompenses</h3>
                    <p class="text-gray-600 mt-2 text-lg">
                        Recevez des primes pour chaque vulnérabilité validée.
                    </p>
                </div>
            </div>
        </div>
       
    </main>
@endsection
