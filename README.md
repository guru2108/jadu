# Symfony Text Checkers

This Symfony project provides functionalities to check if a word is an anagram, palindrome, or pangram.

## Getting Started

### Prerequisites

Make sure you have the following installed on your system:

-   PHP (>= 7.0)
-   Composer
-   Symfony CLI
-   A web browser (preferred: Chrome latest)

### Installation

1. Clone the repository:

```
git clone https://github.com/your-username/text-checkers.git
```

2. Navigate to the project directory:

```
cd jadu_assessment
```

3. Install dependencies:

```
composer install
```

## Running the application

### Start the Symfony development server:

```
symfony server:start
```

Visit http://localhost:8000 in your web browser to access the application.

### Testing

# To run tests (from the project directory):

```
./vendor/bin/phpunit
```

## Functionalities

### Palindrome Checker

This feature allows you to check if a word is a palindrome.

### Anagram Checker

This feature allows you to check if two words are anagrams.

### Panagram Checker

This feature allows you to check if a sentence/phase is a pangram. It returns true the phase contains at
least one instance of every letter in the English alphabet.
