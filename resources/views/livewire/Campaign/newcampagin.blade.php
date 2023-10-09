<div class="row w-50 ms-3">
    <form wire:submit.prevent="storeNewCampaign">
        @csrf
        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input wire:model="title" wire:initial="old('title')" type="text" class="form-control" id="title"
                name="title" value="{{ old('title') }}" required>
            <div class="text-danger fs-5">
                @error('title')
                    *{{ $message }}
                @enderror
            </div>

        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea wire:model="description" class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
            <div class="text-danger fs-5">
                @error('description')
                    *{{ $message }}
                @enderror
            </div>
        </div>


        <div class="d-flex mb-3 flex-grow">
            <!-- Start Date -->
            <div class="me-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input wire:model="start_date" type="datetime-local" class="form-control" id="start_date"
                    name="start_date" required>
                <div class="text-danger fs-5">
                    @error('start_date')
                        *{{ $message }}
                    @enderror
                </div>

            </div>

            <!-- End Date -->
            <div>
                <label for="end_date" class="form-label">End Date</label>
                <input wire:model="end_date" type="datetime-local" class="form-control" id="end_date" name="end_date"
                    required>
                <div class="text-danger fs-5">
                    @error('end_date')
                        *{{ $message }}
                    @enderror
                </div>

            </div>
        </div>

        <div class="d-flex mb-3 flex-grow">
            <!-- Status -->
            <div class="me-5">
                <label for="status" class="form-label">Status</label>
                <select wire:model="status" class="form-control" id="status" name="status" required>
                    <option value="active">Active</option>
                    <option value="complete">Complete</option>
                    <option value="pending" selected>Pending</option>
                </select>
                <div class="text-danger fs-5">
                    @error('status')
                        *{{ $message }}
                    @enderror
                </div>
            </div>
            <!-- Type -->
            <div>
                <label for="type" class="form-label">Type</label>
                <input wire:model="type" type="text" class="form-control" id="type" name="type"
                    value="{{ old('type') }}" required>
                <div class="text-danger fs-5">
                    @error('type')
                        *{{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea wire:model="content" class="form-control" id="content" name="content" rows="6" required>{{ old('content') }}</textarea>
            <div class="text-danger fs-5">
                @error('content')
                    *{{ $message }}
                @enderror
            </div>

        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Create Campaign</button>
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
