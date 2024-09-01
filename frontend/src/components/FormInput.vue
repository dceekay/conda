<template>
    <div class="relative">
      <label :for="id" class="block text-sm font-semibold text-gray-600" :aria-label="label">{{ label }}</label>
      <input 
        :id="id"
        :type="type" 
        :value="modelValue" 
        :placeholder="placeholder"
        :class="inputClasses"
        :required="required"
        @input="$emit('update:modelValue', $event.target.value)"
      />
      <span v-if="error" class="text-red-500 text-sm absolute mt-1">{{ error }}</span>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      modelValue: String,
      label: String,
      type: {
        type: String,
        default: 'text'
      },
      id: String,
      placeholder: String,
      error: String,
      required: {
        type: Boolean,
        default: false
      }
    },
    computed: {
      inputClasses() {
        return "mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 ease-in-out transform hover:scale-105";
      }
    }
  };
  </script>
  