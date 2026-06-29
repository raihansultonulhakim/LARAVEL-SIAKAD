<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mahasiswa;

class TestNimGeneration extends Command
{
    protected $signature = 'test:nim-generation';
    protected $description = 'Test NIM auto-generation';

    public function handle()
    {
        $lastMahasiswa = Mahasiswa::orderBy('nim', 'desc')->first();
        $nextNIM = $lastMahasiswa ? (intval($lastMahasiswa->nim) + 1) : 2401001;
        
        $this->info('Last NIM: ' . ($lastMahasiswa->nim ?? 'none'));
        $this->info('Next NIM: ' . $nextNIM);
        
        // Render view with $nextNIM
        $html = view('admin.crud.tambah_datamahasiswa', compact('nextNIM'))->render();
        
        // Check if value attribute has nextNIM
        if (strpos($html, 'value="' . $nextNIM . '"') !== false) {
            $this->info('✓ NIM value correctly rendered in view');
        } else {
            $this->error('✗ NIM value NOT found in rendered view');
            // Show first 500 chars of form for debugging
            preg_match('/input[^>]*id="nim"[^>]*/i', $html, $matches);
            if ($matches) {
                $this->line('Found NIM input: ' . $matches[0]);
            }
        }
    }
}
