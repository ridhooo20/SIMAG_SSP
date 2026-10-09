<x-app-layout>

    <x-slot name="header">

        <div>
            <h2 class="text-xl font-semibold text-gray-800">
                Edit Posisi Magang
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Perbarui informasi posisi magang.
            </p>
        </div>

    </x-slot>


    <div class="py-10">

        <div class="mx-auto max-w-3xl px-5 sm:px-6 lg:px-8">

            <form method="POST" action="{{ route('admin.positions.update', $position) }}"
                class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                @csrf

                @method('PUT')


                {{-- Nama --}}
                <div>

                    <label for="name" class="text-sm font-semibold text-slate-700">

                        Nama Posisi

                    </label>

                    <input id="name" name="name" type="text" value="{{ old('name', $position->name) }}"
                        required
                        class="mt-2 block w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-[#29459b] focus:ring-[#29459b]">

                    @error('name')
                        <p class="mt-1 text-xs text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Department --}}
                <div class="mt-5">

                    <label for="department" class="text-sm font-semibold text-slate-700">

                        Departemen

                    </label>

                    <input id="department" name="department" type="text"
                        value="{{ old('department', $position->department) }}" required
                        class="mt-2 block w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-[#29459b] focus:ring-[#29459b]">

                    @error('department')
                        <p class="mt-1 text-xs text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Description --}}
                <div class="mt-5">

                    <label for="description" class="text-sm font-semibold text-slate-700">

                        Deskripsi

                    </label>

                    <textarea id="description" name="description" rows="4"
                        class="mt-2 block w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-[#29459b] focus:ring-[#29459b]">{{ old('description', $position->description) }}</textarea>

                    @error('description')
                        <p class="mt-1 text-xs text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Quota --}}
                <div class="mt-5">

                    <label for="quota" class="text-sm font-semibold text-slate-700">

                        Kuota

                    </label>

                    <input id="quota" name="quota" type="number" min="1"
                        value="{{ old('quota', $position->quota) }}" required
                        class="mt-2 block w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-[#29459b] focus:ring-[#29459b]">

                    @error('quota')
                        <p class="mt-1 text-xs text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <div>
                    <label for="is_active" class="block text-sm font-medium text-slate-700">
                        Status Posisi
                    </label>

                    <select id="is_active" name="is_active" required
                        class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="1" {{ old('is_active', $position->is_active) == '1' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="0" {{ old('is_active', $position->is_active) == '0' ? 'selected' : '' }}>
                            Tidak Aktif
                        </option>
                    </select>

                    @error('is_active')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                {{-- Buttons --}}
                <div class="mt-8 flex items-center justify-end gap-3">

                    <a href="{{ route('admin.positions.index') }}"
                        class="rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-100">

                        Batal

                    </a>

                    <button type="submit"
                        class="rounded-xl bg-[#29459b] px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#20377d]">

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
