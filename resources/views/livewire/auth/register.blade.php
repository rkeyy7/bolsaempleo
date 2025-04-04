<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Spatie\Permission\Models\Role;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $role = '';
    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'exists:roles,name'],
        ]);


        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        $user->assignRole($validated['role']);

        event(new Registered(($user)));

        Auth::login($user);

        $this->redirectIntended(route('offers.index', absolute: false), navigate: true);
        
    }
    
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Crea una cuenta')" :description="__('introduce tus datos para crear tu cuenta')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input
            wire:model="name"
            :label="__('Nombre')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('Nombre')"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Correo Electronico')"
            type="email"
            required
            autocomplete="email"
            placeholder="correo@ejemplo.com"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Contraseña')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Contraseña')"
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirmar Contraseña')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirmar Contraseña')"
        />
        <!-- Role -->
        {{-- <flux:radio 
            wire:model="role"
            :label="__('Role')"
            :options="['admin' => 'Admin', 'user' => 'User']"
            required
        /> --}}
        <div class="flex flex-col gap-2">
            <label for="role" class="text-sm font-medium text-zinc-700 dark:text-zinc-300">{{ __('Role') }}</label>
            <select id="role" wire:model="role" required class="form-select block w-full rounded-md border-zinc-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-zinc-800 dark:border-zinc-600 dark:text-zinc-200">
                <option value="">{{ __('Escoge tu') }}</option>
                <option value="employer">{{ __('Employer') }}</option>
                <option value="user">{{ __('User') }}</option>
            </select>
            @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-end"> 
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Crear Cuenta') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Ya tienes una cuenta?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Inicia Sesion') }}</flux:link>
    </div>
</div>
