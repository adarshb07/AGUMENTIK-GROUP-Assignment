<?php
    include 'admin/config.php';

    $result = $db->query("SELECT * FROM content");
    $data = [];

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $data[$row['content_key']] = $row['content_value'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="assets/svg/logo_icon.svg" type="image/svg">
		<link rel="stylesheet" href="styles/fonts.css" />
		<link rel="stylesheet" href="styles/style.css" />
		<script src="https://cdn.tailwindcss.com"></script>
		<style type="text/tailwindcss">
			@layer base {
				:root {
					--primary: 83 78 232;
					--dark: 8 10 41;
				}
			}
		</style>
		<script>
			tailwind.config = {
				theme: {
					extend: {
						colors: {
							primary: "rgb(var(--primary) / <alpha-value>)",
							dark: "rgb(var(--dark) / <alpha-value>)",
						},
					},
				},
			};
		</script>
		<title><?php echo $data['website_title'] ?></title>
	</head>
	<body class="overflow-x-hidden">
		<main class="max-w-[95%] p-4 mx-auto text-lg">
			<nav class="flex items-center justify-between py-4">
				<img
					class="h-8"
					src="assets/svg/signsecure_logo.svg"
					alt="SignSecure"
				/>
				<div
					class="flex gap-8 items-center justify-center text-dark/90"
				>
					<div class="flex items-center justify-center gap-2">
						PDF & eSign
						<img
							class="h-2"
							src="assets/svg/chevron_down.svg"
							alt="Open"
						/>
					</div>
					<div class="flex items-center justify-center gap-2">
						Solutions
						<img
							class="h-2"
							src="assets/svg/chevron_down.svg"
							alt="Open"
						/>
					</div>
					<div class="flex items-center justify-center gap-2">
						Pricing
						<img
							class="h-2"
							src="assets/svg/chevron_down.svg"
							alt="Open"
						/>
					</div>
				</div>
				<div
					class="flex items-center justify-center gap-8 text-dark/90"
				>
					Login
					<button
						class="group py-2 px-4 font-bold border border-dark flex items-center justify-center hover:bg-dark hover:text-white"
					>
						Free Trial
						<img
							class="h-3 ml-2 group-hover:invert group-hover:contrast-200"
							src="assets/svg/right_arrow.svg"
							alt="Start Free Trial"
						/>
					</button>
				</div>
			</nav>
			<section
				class="px-14 py-28 flex items-start justify-between relative my-8"
			>
				<img
					class="h-[80%] absolute left-0 top-1/2 -translate-x-20 -translate-y-1/2 z-0"
					src="assets/svg/scribble_1.svg"
					alt=""
				/>
				<img
					class="h-[80%] absolute right-0 top-1/2 translate-x-1/2 -translate-y-1/2 z-0"
					src="assets/svg/scribble_2.svg"
					alt=""
				/>
				<h1 class="text-6xl np z-10">
					<?php echo $data['hero_heading'] ?>
				</h1>
				<div
					class="max-w-[30%] flex flex-col items-center justify-center gap-8 text-dark/40 z-10"
				>
					<p>
						<?php echo $data['hero_side_content'] ?>
					</p>
					<div class="flex items-center justify-between w-full">
						<button
							class="text-white py-3 px-6 rounded-md bg-primary font-semibold"
						>
							<?php echo $data['hero_button_1_text'] ?>
						</button>
						<button
							class="group py-3 text-dark px-5 font-bold border-b-2 border-dark flex items-center justify-center hover:bg-dark hover:text-white"
						>
							<?php echo $data['hero_button_2_text'] ?>
							<img
								class="h-3 ml-2 group-hover:invert group-hover:contrast-200"
								src="assets/svg/right_arrow.svg"
								alt="See Pricing"
							/>
						</button>
					</div>
				</div>
			</section>
			<section class="grid grid-cols-4 grid-rows-5 gap-6">
				<div
					class="rounded-3xl flex justify-center flex-col gap-4 px-8 py-14 gradient-2 col-span-1 row-span-2"
				>
					<div
						class="flex justify-start items-end font-semibold gap-4 text-2xl"
					>
						<?php echo $data['card_1_heading'] ?>
					</div>
					<span class="text-dark/40">
						<?php echo $data['card_1_content'] ?>
					</span>
				</div>
				<div
					class="rounded-3xl flex justify-center flex-col gap-4 px-8 py-14 gradient-2 col-span-1 row-span-2"
				>
					<div
						class="flex justify-start items-end font-semibold gap-4 text-2xl"
					>
						<?php echo $data['card_2_heading'] ?>
					</div>
					<span class="text-dark/40">
						<?php echo $data['card_2_content'] ?>
					</span>
				</div>
				<div
					class="rounded-3xl col-span-2 row-span-5 overflow-hidden relative"
				>
					<img
						class="h-full w-full object-cover"
						src="assets/images/<?php echo $data['card_3_image'] ?>"
						alt=""
					/>
					<img
						class="w-[60%] absolute bottom-4 left-4"
						src="assets/svg/small_signature_card.svg"
						alt="Trust Proof"
					/>
				</div>
				<div
					class="rounded-3xl col-span-2 row-span-3 overflow-hidden relative bg-black"
				>
					<img
						class="h-full w-full object-cover opacity-50"
						src="assets/images/<?php echo $data['card_4_image'] ?>"
						alt="Video Thumbnail"
					/>
					<button>
						<img
							class="w-[15%] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 backdrop-blur-sm bg-white/10 rounded-full"
							src="assets/svg/play_button.svg"
							alt="Play Button"
						/>
					</button>
				</div>
			</section>
		</main>
	</body>
</html>
