@extends('layouts.app')

@section('main')
<div class="flex min-h-screen">
    @include('partials.hunter.sidebar')

    <div class="flex-1 flex flex-col overflow-hidden">
        @include('partials.hunter.header')

        <main class="flex-1 overflow-auto p-6 bg-gradient-to-t from-white via-white via-30% to-[#E8F5E9]">
            <div class="max-w-4xl mx-auto">
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.24 7.76a6 6 0 00-8.48 8.48M12 9v4l3 3" />
                        </svg>
                        Submit New Report
                    </h1>
                </div>

                <!-- Report Form -->
                <div class="bg-white rounded-xl shadow-xs border border-gray-200 p-6">
                    <form action="{{ route('hunter_report_store', $id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Report Title</label>
                                <input type="text" name="title" id="title" required class="mt-1 block w-full rounded-lg border-gray-300 px-3 py-2 shadow-sm focus:ring-red-500 focus:border-red-500 @error('title') border-red-500 @enderror" value="{{ old('title') }}">
                                @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Type -->
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                <select name="type" id="type" required class="mt-1 block w-full rounded-lg border-gray-300 px-3 py-2 shadow-sm focus:ring-red-500 focus:border-red-500 @error('type') border-red-500 @enderror">
                                    <option value="" disabled {{ old('type') ? '' : 'selected' }}>Select type</option>
                                    <option value="SQL Injection" {{ old('type') == 'SQL Injection' ? 'selected' : '' }}>SQL Injection</option>
                                    <option value="XSS" {{ old('type') == 'XSS' ? 'selected' : '' }}>Cross-site Scripting (XSS)</option>
                                    <option value="CSRF" {{ old('type') == 'CSRF' ? 'selected' : '' }}>Cross-site Request Forgery (CSRF)</option>
                                    <option value="RCE" {{ old('type') == 'RCE' ? 'selected' : '' }}>Remote Code Execution (RCE)</option>
                                    <option value="Other" {{ old('type') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('type') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Target -->
                            <div>
                                <label for="target" class="block text-sm font-medium text-gray-700">Target (URL or Endpoint)</label>
                                <input type="text" name="target" id="target" required class="mt-1 block w-full rounded-lg border-gray-300 px-3 py-2 shadow-sm focus:ring-red-500 focus:border-red-500 @error('target') border-red-500 @enderror" value="{{ old('target') }}">
                                @error('target') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Steps -->
                            <div>
                                <label for="steps" class="block text-sm font-medium text-gray-700">Steps to Reproduce</label>
                                <textarea name="steps" id="steps" rows="4" required class="mt-1 block w-full rounded-lg border-gray-300 px-3 py-2 shadow-sm focus:ring-red-500 focus:border-red-500 @error('steps') border-red-500 @enderror">{{ old('steps') }}</textarea>
                                @error('steps') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Impact -->
                            <div>
                                <label for="impact" class="block text-sm font-medium text-gray-700">Impact</label>
                                <textarea name="impact" id="impact" rows="3" required class="mt-1 block w-full rounded-lg border-gray-300 px-3 py-2 shadow-sm focus:ring-red-500 focus:border-red-500 @error('impact') border-red-500 @enderror">{{ old('impact') }}</textarea>
                                @error('impact') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- PoC Video Upload -->
                            <div>
                                <label for="poc" class="block text-sm font-medium text-gray-700">Upload Proof of Concept (Video)</label>
                                <input type="file" name="poc" id="poc" accept="video/*" required class="mt-1 block w-full rounded-lg border-gray-300 px-3 py-2 shadow-sm @error('poc') border-red-500 @enderror">
                                @error('poc') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Severity -->
                            <div>
                                <label for="severity" class="block text-sm font-medium text-gray-700">Severity</label>
                                <select name="severity" id="severity" required class="mt-1 block w-full rounded-lg border-gray-300 px-3 py-2 shadow-sm focus:ring-red-500 focus:border-red-500 @error('severity') border-red-500 @enderror">
                                    <option value="" disabled {{ old('severity') ? '' : 'selected' }}>Select severity</option>
                                    <option value="Low" {{ old('severity') == 'Low' ? 'selected' : '' }}>Low</option>
                                    <option value="Medium" {{ old('severity') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="High" {{ old('severity') == 'High' ? 'selected' : '' }}>High</option>
                                    <option value="Critical" {{ old('severity') == 'Critical' ? 'selected' : '' }}>Critical</option>
                                </select>
                                @error('severity') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Submit -->
                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm shadow-sm">Submit Report</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
