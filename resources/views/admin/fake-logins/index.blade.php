<!-- Script -->
<script src="https://cdn.tailwindcss.com"></script>

@extends('layouts.admin') {{-- layout dashboard kamu --}}

@section('title', 'Percobaan Login Palsu')
@section('page-title', 'Percobaan Login Palsu')

@section('content')
<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="mb-4 text-xl font-bold">Berikut Adalah Data Percobaan Login Palsu dari Pihak Luar</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-sm font-medium text-left text-gray-600">IP</th>
                    <th class="px-4 py-2 text-sm font-medium text-left text-gray-600">Email</th>
                    <th class="px-4 py-2 text-sm font-medium text-left text-gray-600">User Agent</th>
                    <th class="px-4 py-2 text-sm font-medium text-left text-gray-600">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($logins as $login)
                    <tr>
                        <td class="px-4 py-2 text-sm">{{ $login->ip }}</td>
                        <td class="px-4 py-2 text-sm">{{ $login->email }}</td>
                        <td class="px-4 py-2 text-sm">{{ Str::limit($login->user_agent, 40) }}</td>
                        <td class="px-4 py-2 text-sm">{{ $login->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center text-gray-500">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $logins->links() }} {{-- pagination --}}
    </div>
</div>
@endsection

