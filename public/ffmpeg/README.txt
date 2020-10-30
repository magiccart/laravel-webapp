Downloaded from OTTVerse.com <https://ottverse.com/ffmpeg-builds> 


Configuration Settings 
====================== 
--disable-autodetect 
--enable-amf 
--enable-bzlib 
--enable-cuda 
--enable-cuvid 
--enable-d3d11va 
--enable-dxva2 
--enable-iconv 
--enable-lzma 
--enable-nvenc
--enable-zlib
--enable-sdl2
--enable-ffnvcodec
--enable-nvdec
--enable-cuda-llvm
--enable-libmp3lame
--enable-libopus
--enable-libvorbis
--enable-libvpx
--enable-libx264
--enable-libx265
--enable-libdav1d
--enable-libaom
--disable-debug
--enable-fontconfig
--enable-libass
--enable-libbluray
--enable-libfreetype
--enable-libmfx
--enable-libmysofa
--enable-libopencore-amrnb
--enable-libopencore-amrwb
--enable-libopenjpeg
--enable-libsnappy
--enable-libsoxr
--enable-libspeex
--enable-libtheora
--enable-libtwolame
--enable-libvidstab
--enable-libvo-amrwbenc
--enable-libwavpack
--enable-libwebp
--enable-libxml2
--enable-libzimg
--enable-libshine
--enable-gpl
--enable-avisynth
--enable-libxvid
--enable-libopenmpt
--enable-version3
--enable-librav1e
--enable-libsrt
--enable-libgsm
--enable-libvmaf
--enable-libsvtav1
--enable-librtmp
--enable-mbedtls
--extra-cflags=-DLIBTWOLAME_STATIC
--extra-libs=-lstdc++
--extra-cflags=-DLIBXML_STATIC
--extra-libs=-liconv
--disable-w32threads



Revisions Used
==============
AMF 802f92e Updated documentation
aom 01f56e716 Re-enable PictureEncodePresenceTest
AviSynthPlus f44a7c66 Update changelogs
cargo-c 60a5a65 Update cbindgen again
curl 0c9211798 tiny-curl: 7.72.0 release
dav1d 0243c3f CI/test-debian-asan: run address sanitizer tests both with and without asm
ffmpeg aa5e49e46d avcodec/av1dec: call ff_cbs_flush() on decoder flush
ffnvcodec b6600f5 Bump for (in-dev) 10.0.26.2
flac ce6dd6b5 CMake polishing
fontconfig b1df110 Bump version to 2.13.92
fribidi 5464c28 Bumped version to 1.0.10
gpac c6ca4f24d fixed crash introduced by prev commit
harfbuzz a99e8721 [use] Fix tests with MSVC
libaacs 0c09c3f Simplify alloc size calculation
libass 962b1a3 Add more invisible characters to ass_shaper_skip_characters
libavif 877067a Add aom-specific codec option enable-chroma-deltaq
libbdplus e98c143 Update README and move to Markdown
libbluray 1ce479c1 Fix long delay in "Evangelion, You are (not) alone" menu
libmfx 2cd279f Merge pull request #81 from maximd33/master
libmysofa 6f4f25e Update README.md
librtmp c5f04a5 Reject Content-Length over 2^31
libsoxr 945b592 update NEWS, versions
libwebp cf847cba use WEBP_DSP_INIT_FUNC for Init{GammaTables*,GetCoeffs}
libxml2 0b3c64d9 Handle dumps of corrupted documents more gracefully
libzen 14b165e Merge pull request #118 from g-maxime/osx-toolchain
openmpt 5c6c24339 [Mod] libopenmpt: Prepare for release.
opus 034c1b61 Fix MSVC warning about trunction from double to float
rav1e 0a25b444 fuzz: Increase coverage of encode
srt 73ee1e1 [docs] Fixed URI option in srt-live-transmit.md (#1578)
SVT-AV1 3fbd1ee9 Time: Refactor time functions similar to SVT-VP9 (#1509)
vidstab e851e7b Revert "Merge pull request #91 from 1480c1/openmp"
vmaf a7eff6a Update README.md
vpx 956d3cac3 configure.sh: fix arm64-darwin-gcc match
x264 db0d4177 Rename function x264_strdup to x264_param_strdup
x265_git a82c6c7a7 analysis-save/load: Enable reuse of cutree info in reuse-levels >= 2
zimg e17ee6c Update version to 3.0.1





General Notice
===============
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.