<?php
namespace PHPReportMaker12\vendor_report;

// Session


// Output buffering
session_start();

// Autoload
include_once "rautoload.php";
?>
<?php

// Create page object
if (!isset($vendor_booking_report_rpt))
	$vendor_booking_report_rpt = new vendor_booking_report_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$vendor_booking_report_rpt;

// Run the page
$Page->run();

// Setup login status
SetClientVar("login", LoginStatus());
if (!$DashboardReport)
	WriteHeader(FALSE);

// Global Page Rendering event (in rusrfn*.php)
Page_Rendering();

// Page Rendering event
$Page->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rheader.php" ?>
<?php } ?>
<?php if ($Page->Export == "" || $Page->Export == "print") { ?>
<script>
currentPageID = ew.PAGE_ID = "rpt"; // Page ID
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Form object
var fvendor_booking_reportrpt = currentForm = new ew.Form("fvendor_booking_reportrpt");

// Validate method
fvendor_booking_reportrpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fvendor_booking_reportrpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fvendor_booking_reportrpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fvendor_booking_reportrpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fvendor_booking_reportrpt.lists["x_booking_date"] = <?php echo $vendor_booking_report_rpt->booking_date->Lookup->toClientList() ?>;
fvendor_booking_reportrpt.lists["x_booking_date"].popupValues = <?php echo json_encode($vendor_booking_report_rpt->booking_date->SelectionList) ?>;
fvendor_booking_reportrpt.lists["x_booking_date"].popupOptions = <?php echo JsonEncode($vendor_booking_report_rpt->booking_date->popupOptions()) ?>;
fvendor_booking_reportrpt.lists["x_booking_date"].options = <?php echo JsonEncode($vendor_booking_report_rpt->booking_date->lookupOptions()) ?>;
fvendor_booking_reportrpt.lists["x_vendor_name"] = <?php echo $vendor_booking_report_rpt->vendor_name->Lookup->toClientList() ?>;
fvendor_booking_reportrpt.lists["x_vendor_name"].popupValues = <?php echo json_encode($vendor_booking_report_rpt->vendor_name->SelectionList) ?>;
fvendor_booking_reportrpt.lists["x_vendor_name"].popupOptions = <?php echo JsonEncode($vendor_booking_report_rpt->vendor_name->popupOptions()) ?>;
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<a id="top"></a>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-container" class="container-fluid ew-container">
<?php } ?>
<?php if (ReportParam("showfilter") === TRUE) { ?>
<?php $Page->showFilterList(TRUE) ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$Page->DrillDownInPanel) {
	$Page->ExportOptions->render("body");
	$Page->SearchOptions->render("body");
	$Page->FilterOptions->render("body");
	$Page->GenerateOptions->render("body");
}
?>
</div>
<?php $Page->showPageHeader(); ?>
<?php $Page->showMessage(); ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Center Container - Report -->
<div id="ew-center" class="<?php echo $vendor_booking_report_rpt->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="report_summary">
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<!-- Search form (begin) -->
<?php

	// Render search row
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_SEARCH;
	$Page->renderRow();
?>
<form name="fvendor_booking_reportrpt" id="fvendor_booking_reportrpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fvendor_booking_reportrpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_booking_date" class="ew-cell form-group">
	<label for="x_booking_date" class="ew-search-caption ew-label"><?php echo $Page->booking_date->caption() ?></label>
	<span class="ew-search-field">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($Page->booking_date->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo GetFilterDropDownValue($Page->booking_date) ?></button>
		<div id="dsl_x_booking_date" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="position: relative; overflow-x: hidden;">
<?php echo $Page->booking_date->radioButtonListHtml(TRUE, "x_booking_date") ?>
			</div><!-- /.ew-items -->
		</div><!-- /.dropdown-menu -->
		<div id="tp_x_booking_date" class="ew-template"><input type="radio" class="form-check-input" data-table="vendor_booking_report" data-field="x_booking_date" data-value-separator="<?php echo $Page->booking_date->displayValueSeparatorAttribute() ?>" name="x_booking_date" id="x_booking_date" value="{value}"<?php echo $Page->booking_date->editAttributes() ?>></div>
	</div><!-- /.btn-group -->
	<?php if (!$Page->booking_date->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fa fa-times ew-icon"></i>
	</button>
	<?php } ?>
</div><!-- /.ew-dropdown-list -->
<?php echo $Page->booking_date->Lookup->getParamTag("p_x_booking_date") ?>
</span>
</div>
</div>
<div id="r_2" class="ew-row d-sm-flex">
<div id="c_vendor_name" class="ew-cell form-group">
	<label for="x_vendor_name" class="ew-search-caption ew-label"><?php echo $Page->vendor_name->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("="); ?><input type="hidden" name="z_vendor_name" id="z_vendor_name" value="="></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->vendor_name->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="vendor_booking_report" data-field="x_vendor_name" id="x_vendor_name" name="x_vendor_name" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($Page->vendor_name->getPlaceHolder()) ?>" value="<?php echo "{$_SESSION['vendorname']}"; ?>"<?php echo $Page->vendor_name->editAttributes() ?>>
</span>
</div>
</div>
<div class="ew-row d-sm-flex">
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><?php echo $ReportLanguage->phrase("Search") ?></button>
<button type="reset" name="btn-reset" id="btn-reset" class="btn hide"><?php echo $ReportLanguage->phrase("Reset") ?></button>
</div>
</div>
</form>
<script>
fvendor_booking_reportrpt.filterList = <?php echo $Page->getFilterList() ?>;
</script>
<!-- Search form (end) -->
<?php } ?>
<?php if ($Page->ShowCurrentFilter) { ?>
<?php $Page->showFilterList() ?>
<?php } ?>
<?php

// Set the last group to display if not export all
if ($Page->ExportAll && $Page->Export <> "") {
	$Page->StopGroup = $Page->TotalGroups;
} else {
	$Page->StopGroup = $Page->StartGroup + $Page->DisplayGroups - 1;
}

// Stop group <= total number of groups
if (intval($Page->StopGroup) > intval($Page->TotalGroups))
	$Page->StopGroup = $Page->TotalGroups;
$Page->RecordCount = 0;
$Page->RecordIndex = 0;

// Get first row
if ($Page->TotalGroups > 0) {
	$Page->loadRowValues(TRUE);
	$Page->GroupCount = 1;
}
$Page->GroupIndexes = InitArray(2, -1);
$Page->GroupIndexes[0] = -1;
$Page->GroupIndexes[1] = $Page->StopGroup - $Page->StartGroup + 1;
while ($Page->Recordset && !$Page->Recordset->EOF && $Page->GroupCount <= $Page->DisplayGroups || $Page->ShowHeader) {

	// Show dummy header for custom template
	// Show header

	if ($Page->ShowHeader) {
?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_vendor_booking_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->booking_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="booking_id"><div class="vendor_booking_report_booking_id"><span class="ew-table-header-caption"><?php echo $Page->booking_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="booking_id">
<?php if ($Page->sortUrl($Page->booking_id) == "") { ?>
		<div class="ew-table-header-btn vendor_booking_report_booking_id">
			<span class="ew-table-header-caption"><?php echo $Page->booking_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer vendor_booking_report_booking_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->booking_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->booking_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->booking_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->booking_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->booking_date->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="booking_date"><div class="vendor_booking_report_booking_date"><span class="ew-table-header-caption"><?php echo $Page->booking_date->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="booking_date">
<?php if ($Page->sortUrl($Page->booking_date) == "") { ?>
		<div class="ew-table-header-btn vendor_booking_report_booking_date">
			<span class="ew-table-header-caption"><?php echo $Page->booking_date->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_booking_date', form: 'fvendor_booking_reportrpt', name: 'vendor_booking_report_booking_date', range: false, from: '<?php echo $Page->booking_date->RangeFrom; ?>', to: '<?php echo $Page->booking_date->RangeTo; ?>' });" id="x_booking_date<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer vendor_booking_report_booking_date" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->booking_date) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->booking_date->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->booking_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->booking_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_booking_date', form: 'fvendor_booking_reportrpt', name: 'vendor_booking_report_booking_date', range: false, from: '<?php echo $Page->booking_date->RangeFrom; ?>', to: '<?php echo $Page->booking_date->RangeTo; ?>' });" id="x_booking_date<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->user_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="user_name"><div class="vendor_booking_report_user_name"><span class="ew-table-header-caption"><?php echo $Page->user_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="user_name">
<?php if ($Page->sortUrl($Page->user_name) == "") { ?>
		<div class="ew-table-header-btn vendor_booking_report_user_name">
			<span class="ew-table-header-caption"><?php echo $Page->user_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer vendor_booking_report_user_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->user_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->user_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->user_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->user_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->vendor_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="vendor_name"><div class="vendor_booking_report_vendor_name"><span class="ew-table-header-caption"><?php echo $Page->vendor_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="vendor_name">
<?php if ($Page->sortUrl($Page->vendor_name) == "") { ?>
		<div class="ew-table-header-btn vendor_booking_report_vendor_name">
			<span class="ew-table-header-caption"><?php echo $Page->vendor_name->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_vendor_name', form: 'fvendor_booking_reportrpt', name: 'vendor_booking_report_vendor_name', range: false, from: '<?php echo $Page->vendor_name->RangeFrom; ?>', to: '<?php echo $Page->vendor_name->RangeTo; ?>' });" id="x_vendor_name<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer vendor_booking_report_vendor_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->vendor_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->vendor_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->vendor_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->vendor_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_vendor_name', form: 'fvendor_booking_reportrpt', name: 'vendor_booking_report_vendor_name', range: false, from: '<?php echo $Page->vendor_name->RangeFrom; ?>', to: '<?php echo $Page->vendor_name->RangeTo; ?>' });" id="x_vendor_name<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->booking_price->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="booking_price"><div class="vendor_booking_report_booking_price"><span class="ew-table-header-caption"><?php echo $Page->booking_price->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="booking_price">
<?php if ($Page->sortUrl($Page->booking_price) == "") { ?>
		<div class="ew-table-header-btn vendor_booking_report_booking_price">
			<span class="ew-table-header-caption"><?php echo $Page->booking_price->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer vendor_booking_report_booking_price" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->booking_price) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->booking_price->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->booking_price->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->booking_price->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->booking_status->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="booking_status"><div class="vendor_booking_report_booking_status"><span class="ew-table-header-caption"><?php echo $Page->booking_status->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="booking_status">
<?php if ($Page->sortUrl($Page->booking_status) == "") { ?>
		<div class="ew-table-header-btn vendor_booking_report_booking_status">
			<span class="ew-table-header-caption"><?php echo $Page->booking_status->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer vendor_booking_report_booking_status" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->booking_status) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->booking_status->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->booking_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->booking_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->payment_status->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="payment_status"><div class="vendor_booking_report_payment_status"><span class="ew-table-header-caption"><?php echo $Page->payment_status->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="payment_status">
<?php if ($Page->sortUrl($Page->payment_status) == "") { ?>
		<div class="ew-table-header-btn vendor_booking_report_payment_status">
			<span class="ew-table-header-caption"><?php echo $Page->payment_status->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer vendor_booking_report_payment_status" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->payment_status) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->payment_status->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->payment_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->payment_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($Page->TotalGroups == 0) break; // Show header only
		$Page->ShowHeader = FALSE;
	}
	$Page->RecordCount++;
	$Page->RecordIndex++;
?>
<?php

		// Render detail row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_DETAIL;
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->booking_id->Visible) { ?>
		<td data-field="booking_id"<?php echo $Page->booking_id->cellAttributes() ?>>
<span<?php echo $Page->booking_id->viewAttributes() ?>><?php echo $Page->booking_id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->booking_date->Visible) { ?>
		<td data-field="booking_date"<?php echo $Page->booking_date->cellAttributes() ?>>
<span<?php echo $Page->booking_date->viewAttributes() ?>><?php echo $Page->booking_date->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->user_name->Visible) { ?>
		<td data-field="user_name"<?php echo $Page->user_name->cellAttributes() ?>>
<span<?php echo $Page->user_name->viewAttributes() ?>><?php echo $Page->user_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->vendor_name->Visible) { ?>
		<td data-field="vendor_name"<?php echo $Page->vendor_name->cellAttributes() ?>>
<span<?php echo $Page->vendor_name->viewAttributes() ?>><?php echo $Page->vendor_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->booking_price->Visible) { ?>
		<td data-field="booking_price"<?php echo $Page->booking_price->cellAttributes() ?>>
<span<?php echo $Page->booking_price->viewAttributes() ?>><?php echo $Page->booking_price->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->booking_status->Visible) { ?>
		<td data-field="booking_status"<?php echo $Page->booking_status->cellAttributes() ?>>
<span<?php echo $Page->booking_status->viewAttributes() ?>><?php echo $Page->booking_status->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->payment_status->Visible) { ?>
		<td data-field="payment_status"<?php echo $Page->payment_status->cellAttributes() ?>>
<span<?php echo $Page->payment_status->viewAttributes() ?>><?php echo $Page->payment_status->getViewValue() ?></span></td>
<?php } ?>
	</tr>
<?php

		// Accumulate page summary
		$Page->accumulateSummary();

		// Get next record
		$Page->loadRowValues();
	$Page->GroupCount++;
} // End while
?>
<?php if ($Page->TotalGroups > 0) { ?>
</tbody>
<tfoot>
	</tfoot>
<?php } elseif (!$Page->ShowHeader && TRUE) { // No header displayed ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_vendor_booking_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || TRUE) { // Show footer ?>
</table>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "vendor_booking_report_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<!-- Summary Report Ends -->
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.ew-container -->
<?php } ?>
<?php
$Page->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php

// Close recordsets
if ($Page->GroupRecordset)
	$Page->GroupRecordset->Close();
if ($Page->Recordset)
	$Page->Recordset->Close();
?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rfooter.php" ?>
<?php } ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>