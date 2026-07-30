# Laravel Nepali Date Converter (Laravel 13+ Compatible)

[![Latest Version](https://img.shields.io/badge/version-1.0.0-blue.svg)](https://github.com/sarojsardar/laravel-nepali-date)
[![PHP Version](https://img.shields.io/badge/php-8.0%2B-brightgreen.svg)](https://php.net)
[![Laravel Version](https://img.shields.io/badge/laravel-13%2B-red.svg)](https://laravel.com)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

A comprehensive Laravel package for converting English (Gregorian) dates to Nepali (Bikram Sambat) dates with full localization support.

## 🌟 Features

- ✅ **Accurate Date Conversion** - English to Nepali date conversion
- ✅ **Extended Year Support** - Supports years 2000-2100 BS (1943-2043 AD)
- ✅ **Multiple Date Formats** - Flexible formatting options
- ✅ **Dual Numeral System** - Nepali (देवनागरी) and English numerals
- ✅ **Localized Month Names** - Both Nepali and English month names
- ✅ **Day Names** - Full day names in Nepali
- ✅ **Timezone Support** - Asia/Kathmandu timezone
- ✅ **Error Handling** - Comprehensive validation and error handling
- ✅ **Laravel Integration** - Facade, Service Provider, and Helper functions
- ✅ **Modern PHP** - PHP 8.0+ with strict typing
- ✅ **Laravel Compatibility** - Laravel 9, 10, 11, 12, 13 support

## 📦 Installation

Install the package via Composer:

```bash
composer require sarojsardar/laravel-nepali-date
```

The package will automatically register its service provider and facade.

## 🚀 Quick Start

### Basic Usage

```php
// Convert today's date to Nepali
echo toNepaliDate(now()->format('Y-m-d')); 
// Output: २०८१-०८-१५

// Convert specific date
echo toNepaliDate('2024-12-01');
// Output: २०८१-०८-१५
```

## 📖 Usage Guide

### Helper Functions

#### `toNepaliDate()`
Convert English date to Nepali date with custom formatting:

```php
// Basic conversion
echo toNepaliDate('2024-01-15'); 
// Output: २०८०-१०-०१

// Custom format with month name
echo toNepaliDate('2024-01-15', 'Y F d'); 
// Output: २०८० पुष ०१

// With day name
echo toNepaliDate('2024-01-15', 'Y F d, l'); 
// Output: २०८० पुष ०१, सोमवार

// English numerals
echo toNepaliDate('2024-01-15', 'Y-m-d', false); 
// Output: 2080-10-01
```

#### `nepaliToday()`
Get today's date in Nepali:

```php
echo nepaliToday(); 
// Output: २०८१-०८-१५

echo nepaliToday('Y F d, l'); 
// Output: २०८१ कार्तिक १५, आइतवार
```

#### `nepaliDateArray()`
Get Nepali date as an array:

```php
$date = nepaliDateArray('2024-01-15');
/*
Output:
[
    'year' => 2080,
    'month' => 10,
    'day' => 1,
    'month_name_nepali' => 'पुष',
    'month_name_english' => 'Poush',
    'day_name' => 'सोमवार'
]
*/
```

### Class Methods

```php
use SarojSardar\LaravelNepaliDate\NepaliDate;

// Convert date
$nepaliDate = NepaliDate::convertToNepali('2024-01-15');

// Format date
echo NepaliDate::format('2024-01-15', 'Y F d l');
// Output: २०८० पुष ०१ सोमवार

// Today's date
echo NepaliDate::today('Y-m-d');
// Output: २०८१-०८-१५

// Check if year is supported
if (NepaliDate::isValidNepaliYear(2080)) {
    echo "Year 2080 is supported";
}

// Get supported year range
$range = NepaliDate::getSupportedYearRange();
// Output: ['min' => 2000, 'max' => 2100]
```

### Facade Usage

```php
use SarojSardar\LaravelNepaliDate\Facades\NepaliDate;

// All class methods available through facade
echo NepaliDate::format('2024-01-15', 'Y F d');
echo NepaliDate::today();
$range = NepaliDate::getSupportedYearRange();
```

### Blade Templates

```blade
{{-- In your Blade templates --}}
<p>Date: {{ toNepaliDate($post->created_at->format('Y-m-d'), 'Y F d') }}</p>
<p>Today: {{ nepaliToday('Y F d, l') }}</p>

{{-- With calendar icon --}}
<span>
    <i class="fas fa-calendar-alt"></i>
    {{ toNepaliDate($news->published_at->format('Y-m-d')) }}
</span>
```

## 🎨 Format Options

| Format | Description | Example Output |
|--------|-------------|----------------|
| `Y` | 4-digit year | २०८० |
| `m` | Month (01-12) | १० |
| `d` | Day (01-32) | ०१ |
| `F` | Full month name (Nepali) | पुष |
| `M` | Full month name (English) | Poush |
| `l` | Day name (Nepali) | सोमवार |

### Format Examples

```php
$date = '2024-01-15';

echo toNepaliDate($date, 'Y-m-d');        // २०८०-१०-०१
echo toNepaliDate($date, 'Y F d');        // २०८० पुष ०१
echo toNepaliDate($date, 'Y M d');        // २०८० Poush ०१
echo toNepaliDate($date, 'd F Y');        // ०१ पुष २०८०
echo toNepaliDate($date, 'l, d F Y');     // सोमवार, ०१ पुष २०८०
echo toNepaliDate($date, 'Y/m/d');        // २०८०/१०/०१
```

## 🌍 Localization

### Nepali Months
- वैशाख (Baisakh)
- जेठ (Jestha) 
- असार (Ashar)
- साउन (Shrawan)
- भदौ (Bhadra)
- असोज (Ashoj)
- कार्तिक (Kartik)
- मंसिर (Mangsir)
- पुष (Poush)
- माघ (Magh)
- फागुन (Falgun)
- चैत (Chaitra)

### Nepali Days
- आइतवार (Sunday)
- सोमवार (Monday)
- मङ्गलवार (Tuesday)
- बुधवार (Wednesday)
- बिहिवार (Thursday)
- शुक्रवार (Friday)
- शनिवार (Saturday)

## ⚠️ Error Handling

The package throws `InvalidArgumentException` for:

```php
try {
    echo toNepaliDate('invalid-date');
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage();
}

// Common error scenarios:
// - Invalid date format: "Invalid date format: invalid-date"
// - Date out of range: "Date out of supported range"
```

## 📅 Supported Date Range

- **Nepali Years**: 2000 BS - 2100 BS
- **English Years**: 1943 AD - 2043 AD
- **Reference Date**: 1943-04-14 AD = 2000-01-01 BS

## 🔧 Advanced Usage

### Custom Service Provider

If you need to customize the package behavior:

```php
// In your AppServiceProvider
public function boot()
{
    // Custom logic here
}
```

### Configuration

The package works out of the box with sensible defaults:
- Timezone: Asia/Kathmandu
- Default format: Y-m-d
- Nepali numerals: Enabled by default

## 🧪 Testing

```php
// Test basic conversion
$result = toNepaliDate('2024-01-15');
assert($result === '२०८०-१०-०१');

// Test format options
$result = toNepaliDate('2024-01-15', 'Y F d');
assert($result === '२०८० पुष ०१');

// Test English numerals
$result = toNepaliDate('2024-01-15', 'Y-m-d', false);
assert($result === '2080-10-01');
```

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This package is open-sourced software licensed under the [MIT license](LICENSE).

## 👨‍💻 Author

**Saroj Sardar**
- Email: sarojsardar25@gmail.com
- GitHub: [@sarojsardar](https://github.com/sarojsardar)

## 🙏 Acknowledgments

- Thanks to the Laravel community
- Nepali calendar data sources
- Contributors and testers

---

**Made with ❤️ for the Nepali developer community**
