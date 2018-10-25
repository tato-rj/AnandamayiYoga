<div class="d-flex">
	<form class="mr-2">
	    <select class="form-control" name="order" onchange="this.form.submit()">
	        <option selected disabled>Order by</option>
	        <option value="name" @filter('order', 'name') selected @endfilter>Name</option>
	        <option value="newest" @filter('order', 'newest') selected @endfilter>Newest</option>
	        <option value="oldest" @filter('order', 'oldest') selected @endfilter>Oldest</option>
	    </select>
	</form>
	<form>
	    <select class="form-control" name="status" onchange="this.form.submit()">
	        <option selected disabled>Show only</option>
	        <option value="unconfirmed" @filter('status', 'unconfirmed') selected @endfilter>Unconfirmed</option>
	        <option value="trial" @filter('status', 'trial') selected @endfilter>On Trial Period</option>
	        <option value="active" @filter('status', 'active') selected @endfilter>Active</option>
	        <option value="membership_expired" @filter('status', 'membership_expired') selected @endfilter>Membership Expired</option>
	        <option value="trial_expired" @filter('status', 'trial_expired') selected @endfilter>Trial Expired</option>
	        <option value="graceperiod" @filter('status', 'graceperiod') selected @endfilter>On Grace Period</option>
	    </select>
	</form>
</div>