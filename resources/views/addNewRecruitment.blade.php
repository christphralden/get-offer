<x-app-layout>
    <div class="mx-auto mt-20">
        <h2 class="text-black font-bold text-2xl mb-4">Create Job Recruitment</h2>
        <form action="{{ route('addRecruitment.store') }}" method="POST" class="w-full max-w-lg">
            @csrf
            <div class="form-group mb-4">
                <label for="position" class="block text-gray-700">Position</label>
                <input id="position" type="text" name="jobDetail[position]" class="form-control mt-1 block w-full" required>
                @error('jobDetail.position')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="jobPlace" class="block text-gray-700">Job Place</label>
                <input id="jobPlace" type="text" name="jobDetail[place]" class="form-control mt-1 block w-full" required>
                @error('jobDetail.place')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="jobShift" class="block text-gray-700">Job Shift</label>
                <input id="jobShift" type="text" name="jobDetail[shift]" class="form-control mt-1 block w-full" required>
                @error('jobDetail.shift')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="salary" class="block text-gray-700">Salary</label>
                <input id="salary" type="number" name="jobDetail[salary]" class="form-control mt-1 block w-full" required>
                @error('jobDetail.salary')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="jobDesc" class="block text-gray-700">Job Description</label>
                <textarea id="jobDesc" name="jobDesc" class="form-control mt-1 block w-full" rows="4" required></textarea>
                @error('jobDesc')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="end_date" class="block text-gray-700">End Date</label>
                <input id="end_date" type="date" name="end_date" class="form-control mt-1 block w-full" required>
                @error('end_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label class="block text-gray-700">Requirements</label>
                <div id="requirements" class="mb-2"></div>
                <button type="button" onclick="addRequirement()" class="bg-blue-500 text-white rounded px-4 py-2">Add Requirement</button>
            </div>

            <div class="form-group mb-4">
                <label class="block text-gray-700">Criteria</label>
                <div id="criteria" class="mb-2"></div>
                <button type="button" onclick="addCriteria()" class="bg-blue-500 text-white rounded px-4 py-2">Add Criteria</button>
            </div>

            <div class="flex justify-center items-center mt-4">
                <button type="submit" class="flex w-full justify-center items-center rounded-lg btn btn-primary text-white p-2 bg-black">
                    Create Recruitment
                </button>
            </div>
        </form>
    </div>

    <script>
        function addRequirement() {
            const requirementsDiv = document.getElementById('requirements');
            const inputContainer = document.createElement('div');
            inputContainer.className = 'flex items-center mb-2';
            
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'requirement[]'; // Using array notation for multiple requirements
            input.className = 'form-control mt-1 block w-full';
            input.placeholder = 'Enter requirement';
            
            const deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.className = 'bg-red-500 text-white rounded px-2 py-1 ml-2';
            deleteButton.innerText = '−'; // Minus sign for delete
            deleteButton.onclick = () => inputContainer.remove(); // Remove input field on click
            
            inputContainer.appendChild(input);
            inputContainer.appendChild(deleteButton);
            requirementsDiv.appendChild(inputContainer);
        }

        function addCriteria() {
            const criteriaDiv = document.getElementById('criteria');
            const inputContainer = document.createElement('div');
            inputContainer.className = 'flex items-center mb-2';
            
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'criteria[]'; // Using array notation for multiple criteria
            input.className = 'form-control mt-1 block w-full';
            input.placeholder = 'Enter criteria';
            
            const deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.className = 'bg-red-500 text-white rounded px-2 py-1 ml-2';
            deleteButton.innerText = '−'; // Minus sign for delete
            deleteButton.onclick = () => inputContainer.remove(); // Remove input field on click
            
            inputContainer.appendChild(input);
            inputContainer.appendChild(deleteButton);
            criteriaDiv.appendChild(inputContainer);
        }
    </script>
</x-app-layout>
