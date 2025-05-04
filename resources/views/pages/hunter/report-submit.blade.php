@extends('layouts.app')

@section('main')
<div class="flex min-h-screen bg-gradient-to-b from-gray-800 to-gray-900 text-white">
    @include('partials.hunter.sidebar')

    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.hunter.header')

        <main class="flex-1 overflow-auto p-8 bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700">
            <div class="max-w-5xl mx-auto">
                <div class="flex items-center gap-4 mb-8">
                    <div class="bg-red-600 p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.24 7.76a6 6 0 00-8.48 8.48M12 9v4l3 3" />
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-white">Submit New Report</h1>
                </div>

                <div class="bg-gray-800 rounded-2xl shadow-md border border-gray-700 p-8">
                    <form id="createReport" action="{{ route('hunter_report_store', $id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <label for="title" class="block text-gray-300 font-semibold mb-1">Report Title</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <input type="text" name="title" id="title" class="pl-10 w-full border border-gray-600 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 py-3 bg-gray-700 text-white placeholder-gray-400" placeholder="Enter the title..." value="{{ old('title') }}" >
                            </div>
                            @error('title') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="type" class="block text-gray-300 font-semibold mb-1">Type</label>
                            <select name="type" id="type" class="w-full border border-gray-600 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 py-3 bg-gray-700 text-white" >
                                <option value="" disabled {{ old('type') ? '' : 'selected' }}>Select type</option>
                                <option value="SQL Injection" {{ old('type') == 'SQL Injection' ? 'selected' : '' }}>SQL Injection</option>
                                <option value="XSS" {{ old('type') == 'XSS' ? 'selected' : '' }}>Cross-site Scripting (XSS)</option>
                                <option value="CSRF" {{ old('type') == 'CSRF' ? 'selected' : '' }}>Cross-site Request Forgery (CSRF)</option>
                                <option value="RCE" {{ old('type') == 'RCE' ? 'selected' : '' }}>Remote Code Execution (RCE)</option>
                                <option value="Other" {{ old('type') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('type') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="target" class="block text-gray-300 font-semibold mb-1">Target (URL or Endpoint)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12l4.243-4.243M6.343 7.757L10.586 12l-4.243 4.243" />
                                    </svg>
                                </div>
                                <input type="text" name="target" id="target" class="pl-10 w-full border border-gray-600 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 py-3 bg-gray-700 text-white placeholder-gray-400" placeholder="https://example.com/endpoint" value="{{ old('target') }}" >
                            </div>
                            @error('target') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="steps" class="block text-gray-300 font-semibold mb-1">Steps to Reproduce</label>
                            <textarea name="steps" id="steps" rows="4" class="w-full border border-gray-600 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 py-3 bg-gray-700 text-white placeholder-gray-400" placeholder="Describe step by step..." >{{ old('steps') }}</textarea>
                            @error('steps') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="impact" class="block text-gray-300 font-semibold mb-1">Impact</label>
                            <textarea name="impact" id="impact" rows="3" class="w-full border border-gray-600 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 py-3 bg-gray-700 text-white placeholder-gray-400" placeholder="Describe the impact..." >{{ old('impact') }}</textarea>
                            @error('impact') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="poc" class="block text-gray-300 font-semibold mb-1">Upload Proof of Concept (Video)</label>
                            <input type="file" name="poc" id="poc" accept="video/*" class="w-full border border-gray-600 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 py-3 bg-gray-700 text-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-600 file:text-white hover:file:bg-red-700">
                            @error('poc') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="severity" class="block text-gray-300 font-semibold mb-1">Severity</label>
                            <select name="severity" id="severity" class="w-full border border-gray-600 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 py-3 bg-gray-700 text-white" >
                                <option value="" disabled {{ old('severity') ? '' : 'selected' }}>Select severity</option>
                                <option value="Low" {{ old('severity') == 'Low' ? 'selected' : '' }}>Low</option>
                                <option value="Medium" {{ old('severity') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                <option value="High" {{ old('severity') == 'High' ? 'selected' : '' }}>High</option>
                                <option value="Critical" {{ old('severity') == 'Critical' ? 'selected' : '' }}>Critical</option>
                            </select>
                            @error('severity') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg shadow-md transition">
                                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Submit Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection