<div class="row w-50 ms-3">
    <form wire:submit.prevent="storeNewUser">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" class="form-control" type="text" wire:model="name" required autofocus
                autocomplete="name">
            <div class="text-danger fs-5">
                @error('name')
                    *{{ $message }}
                @enderror
            </div>

        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control" type="email" wire:model="email" required
                autocomplete="username">
            <div class="text-danger fs-5">
                @error('email')
                    *{{ $message }}
                @enderror
            </div>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-control" type="password" wire:model="password" required
                autocomplete="new-password">
            <div class="text-danger fs-5">
                @error('password')
                    *{{ $message }}
                @enderror
            </div>

        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="form-control" type="password" wire:model="password_confirmation"
                required autocomplete="new-password">
            <div class="text-danger fs-5">
                @error('password_confirmation')
                    *{{ $message }}
                @enderror
            </div>

        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary ml-4">
                {{ __('Register') }}
            </button>
        </div>
        @error('Authentication')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </form>
</div>
